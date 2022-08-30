<?php


namespace App\Services;


use App\Helpers\ActionHelper;
use App\Http\Resources\V1\Orders\Coupon;
use App\Http\Resources\V1\Orders\DeliveryType;
use App\Http\Resources\V1\Orders\HistoryItem;
use App\Http\Resources\V1\Orders\OrderHistory;
use App\Http\Resources\V1\Orders\StoreAddress;
use App\Models\Orders\Order;
use App\Models\Orders\Payment;
use App\Models\Orders\PaymentStatus;
use App\Models\Orders\PaymentType;
use App\Models\Orders\Status;
use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use App\Repositories\CouponRepository;
use App\Repositories\CustomerExpiredCouponRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\DeliveryTypeRepository;
use App\Repositories\GiftCertificateRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderStatusRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentStatusRepository;
use App\Repositories\PaymentTypeRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StoreAddressRepository;
use App\Repositories\TaxRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\{Storage};
use SimpleXMLElement;

class OrderService
{
    use ActionHelper;

    private StoreAddressRepository $storeAddressRepository;
    private OrderRepository $orderRepository;
    private OrderItemRepository $orderItemRepository;
    private TaxRepository $taxRepository;
    private ProductRepository $productRepository;
    private GiftCertificateRepository $giftCertificateRepository;
    private CouponRepository $couponRepository;
    private CustomerRepository $customerRepository;
    private CustomerExpiredCouponRepository $customerExpiredCouponRepository;
    private UserRepository $userRepository;
    private DeliveryTypeRepository $deliveryTypeRepository;
    private CartRepository $cartRepository;
    private CartItemRepository $cartItemRepository;
    private OrderStatusRepository $orderStatusRepository;
    private PaymentTypeRepository $paymentTypeRepository;
    private PaymentStatusRepository $paymentStatusRepository;
    private PaymentRepository $paymentRepository;

    protected $serviceUrl = 'https://e-commerce.kapitalbank.az:5443/Exec';
    protected $cert = 'kapitalbank/testmerchant.crt';
    protected $key = 'kapitalbank/merchant_name.key';
    protected $merchant_id = 'E1000010';
    const PORT = 5443;

    public function __construct(
        StoreAddressRepository $storeAddressRepository,
        OrderRepository $orderRepository,
        TaxRepository $taxRepository,
        ProductRepository $productRepository,
        OrderItemRepository $orderItemRepository,
        GiftCertificateRepository $giftCertificateRepository,
        CouponRepository $couponRepository,
        CustomerRepository $customerRepository,
        CustomerExpiredCouponRepository $customerExpiredCouponRepository,
        UserRepository $userRepository,
        DeliveryTypeRepository $deliveryTypeRepository,
        CartRepository $cartRepository,
        CartItemRepository $cartItemRepository,
        OrderStatusRepository $orderStatusRepository,
        PaymentTypeRepository $paymentTypeRepository,
        PaymentStatusRepository $paymentStatusRepository,
        PaymentRepository $paymentRepository
    )
    {
        $this->storeAddressRepository = $storeAddressRepository;
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->taxRepository = $taxRepository;
        $this->productRepository = $productRepository;
        $this->giftCertificateRepository = $giftCertificateRepository;
        $this->couponRepository = $couponRepository;
        $this->customerRepository = $customerRepository;
        $this->customerExpiredCouponRepository = $customerExpiredCouponRepository;
        $this->userRepository = $userRepository;
        $this->deliveryTypeRepository = $deliveryTypeRepository;
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
        $this->orderStatusRepository = $orderStatusRepository;
        $this->paymentTypeRepository = $paymentTypeRepository;
        $this->paymentStatusRepository = $paymentStatusRepository;
        $this->paymentRepository = $paymentRepository;

        if (Storage::disk('local')->exists($this->cert)) {
            $this->cert = storage_path('app/'.$this->cert);
        } else {
            throw new \Exception("Certificate does not exists: $this->cert");
        }

        if (Storage::disk('local')->exists($this->key)) {
            $this->key = storage_path('app/'.$this->key);
        } else {
            throw new \Exception("Key does not exists: $this->key");
        }
    }

    public function checkout(): array{
        return [
            'storeAddresses' => StoreAddress::collection($this->storeAddressRepository->all()),
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.checkout'),
                    'to' => '/checkout'
                ],
            ],
            'taxes' => $this->mapTaxes($this->taxRepository->all()),
            'deliveryTypes' => DeliveryType::collection($this->deliveryTypeRepository->all())
        ];
    }

    public function storeExpress($data){
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::CART);

        $productDetails = $this->productRepository->find($data['productId']);
        $price = $productDetails->sale_price ?? $productDetails->price;

        $user = auth('api')->user();

        $order = $this->orderRepository->save(null, [
            'customer_id' => $user ? $user->customer->id : null,
            'phone' => $data['phone'],
            'status_id' => $this->orderStatusRepository->findIdByType(Status::STATUS_PREPARING),
            'payment_status_id' => $this->orderStatusRepository->findIdByType(PaymentStatus::STATUS_NOT_PAID),
            'subtotal' => $price,
            'total' => $price,
            'quantity_total' => 1,
            'payment_type_id' => $this->paymentTypeRepository->findIdByTypeKey(PaymentType::CASH) //fix: change to null after modifying orders table
        ]);

        $this->orderItemRepository->save(null, [
            'order_id' => $order->id,
            'product_id' => $data['productId'],
            'price' => $price,
            'quantity' => 1
        ]);

        $customer = $this->customerRepository->getCustomerByPhone($data['phone']);

        if ($customer){
            $this->cartItemRepository->deleteByCustomerId($data['productId'], $customer->id);
        }

        return $order;
    }

    public function store($details, $products, $currency_id){
        \CacheHelper::delete(\CacheHelper::CART_ITEMS);
        \CacheHelper::delete(\CacheHelper::CART);

        $quantityTotal = 0;

        array_map(function ($product) use (&$quantityTotal){
            return $quantityTotal += $product['count'];
        }, $products);

        $user = $this->userRepository->findByEmail($details['email']);

        $order = $this->orderRepository->save(null, [
            'customer_id' => $user ? $user->customer->id : null,
            'fullname' => $details['fullname'],
            'email' => $details['email'],
            'phone' => $details['phone'],
            'shipping_address' => $details['shippingAddress'],
            'store_address_id' => $details['storeAddressId'],
            'status_id' => $this->orderStatusRepository->findIdByType(Status::STATUS_APPROVED),
            'payment_status_id' => $this->paymentStatusRepository->findIdByType(PaymentStatus::STATUS_NOT_PAID),
            'delivery_type_id' => $details['deliveryType']['id'],
            'gift_certificate_id' => $details['giftCertificateId'],
            'coupon_id' => $details['couponId'],
            'payment_type_id' => $this->paymentTypeRepository->findIdByTypeKey($details['paymentType']),
            'subtotal' => $details['subtotal'],
            'total' => $details['total'],
            'quantity_total' => $quantityTotal,
            'currency_id' => $currency_id
        ]);

        foreach ($products as $productData){
            $this->orderItemRepository->save(null,[
                'order_id' => $order->id,
                'product_id' => $productData['id'],
                'price' => $productData['sale_price'] ?? $productData['price'],
                'quantity' => $productData['count'],
            ]);
        }

        if($details['couponId'] && $this->couponRepository->checkCouponOneTime($details['couponId'])){
            $this->customerExpiredCouponRepository->save(null,[
                'customer_id' => $user->customer->id,
                'coupon_id' => $details['couponId']
            ]);
        }

        if ($user){
            $cartId = $this->cartRepository->getIdByCustomer($user->customer->id);
            $this->cartItemRepository->emptyCart($cartId);
        }

        if($details['paymentType'] == PaymentType::CARD){
            $order_data = [
                'order_id' => $order->id,
                'merchant' => $this->merchant_id,
                'amount' => 1,
                'currency' => 944,
                'description' => 'Description',
                'lang' => strtoupper(app()->getLocale())
            ];

            $order->gateway = $this->createOrder($order_data);
        }

        return $order;
    }

    public function validateGiftCertificate($code){
        return $this->giftCertificateRepository->validate($code);
    }

    public function validateCoupon($data){
        $coupon = $this->couponRepository->findByCode($data['code']);

        if(!$coupon){
            return [
                "message" => "Coupon not found",
                "data" => [],
                "status" => Response::HTTP_UNPROCESSABLE_ENTITY
            ];
        }

        $expired = $this->customerExpiredCouponRepository
            ->checkCustomerUsedCoupon($coupon->id, auth('api')->user()->customer->id);

        return $expired ? [
            "message" => "Coupon has been expired",
            "data" => [],
            "status" => Response::HTTP_UNPROCESSABLE_ENTITY
        ] : [
            "message" => "Coupon is valid",
            "data" => [
                    "promo" => new Coupon($coupon),
                    "products" => $this->checkHasPromoAndRetrieveProducts($data)
                ],
            "status" => Response::HTTP_OK
        ];
    }

    private function checkHasPromoAndRetrieveProducts($data){
        $products = [];

        foreach ($data['products'] as $product) {
            $product['hasPromo'] = $this->productRepository->hasPromo($product['id'], $data['code']);
            $products[] = $product;
        }

        return $products;
    }

    public function getHistory(){
        $user = auth('api')->user();

        $orders = $this->orderRepository->getHistory($user ? $user->customer->id : 0);

        return [
            'orders' => OrderHistory::collection($orders),
            'pagination' => [
                'total_count' => $orders->total(),
                'current_page' => $orders->currentPage(),
                'total_pages' => $orders->lastPage(),
                'per_page' => $orders->perPage()
            ],
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.order.history'),
                    'to' => '/order/history'
                ],
            ],
        ];
    }

    public function getOrderProducts($id){
        $historyItemsInfo = [];
        $retrievedData = $this->orderRepository->getHistoryItems($id);

        foreach ($retrievedData->items as $item){
            $historyItemsInfo[] = [
                'id' => $item->product->id,
                'title' => $item->product->title,
                'sku' => $item->product->sku,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'rejected' => $retrievedData->paymentStatus && $retrievedData->paymentStatus->type == PaymentStatus::STATUS_REFUND,
                'promo_action' => $retrievedData->coupon ? $retrievedData->coupon->code : null,
                'gift_certificate' => $retrievedData->giftCertificate ? $retrievedData->giftCertificate->code : null,
                'image' => $item->product->getFirstMediaUrl('productMainImage'),
            ];
        }

        return [
            'order' => [
                'id' => $retrievedData->id,
                'date' => Carbon::make($retrievedData->created_at)->toDateString(),
                'paymentType' => $retrievedData->paymentType->name,
                'paymentStatus' => $retrievedData->paymentStatus ? $retrievedData->paymentStatus->name : null,
                'orderStatus' =>  $retrievedData->status ? $retrievedData->status->name : null,
                'rejected' => $retrievedData->paymentStatus && $retrievedData->paymentStatus->type == PaymentStatus::STATUS_REFUND,
                'price' => $retrievedData->total
            ],
            'items' => $historyItemsInfo,
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.order.history'),
                    'to' => '/order/history'
                ],
            ],
        ];
    }

    private function curl($xml)
    {
        $url = $this->serviceUrl;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_PORT, self::PORT);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');


        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_SSLCERT, $this->cert);
        curl_setopt($ch, CURLOPT_SSLKEY, $this->key);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        //Error handling and return result
        $data = curl_exec($ch);
        if ($data === false) {
            $result = curl_error($ch);
        } else {
            $result = $data;
        }

        // Close handle
        curl_close($ch);

        return $result;
    }

    private function createOrder($order_data)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                <Request>
                    <Operation>CreateOrder</Operation>
                    <Language>' . $order_data['lang'] . '</Language>
                    <Order>
                        <OrderType>Purchase</OrderType>
                        <Merchant>' . $order_data['merchant'] . '</Merchant>
                        <Amount>' . $order_data['amount'] . '</Amount>
                        <Currency>' . $order_data['currency'] . '</Currency>
                        <Description>' . $order_data['description'] . '</Description>
                        <ApproveURL>' . route('order.approve') . '</ApproveURL>
                        <CancelURL>' . route('order.cancel') . '</CancelURL>
                        <DeclineURL>' . route('order.decline') . '</DeclineURL>
                    </Order>
                </Request>
                </TKKPG>
            ';

        $result = $this->curl($xml);

        return $this->handleCurlResponse($order_data, $result);
    }

    private function handleCurlResponse($order_data, $result){
        $oXML = new SimpleXMLElement($result);

        $OrderID = $oXML->Response->Order->OrderID;
        $SessionID = $oXML->Response->Order->SessionID;
        $paymentBaseUrl = $oXML->Response->Order->URL;

        Payment::create([
            'order_id' => $order_data['order_id'],
            'amount' => $order_data['amount'],
            'kapital_order_id' => $OrderID,
            'session_id' => $SessionID,
            'payment_url' => $paymentBaseUrl,
            'status_code' => $oXML->Response->Status,
            'order_description' => $order_data['description'],
            'currency' => $order_data['currency'],
            'language_code' => app()->getLocale(),
        ]);

        $redirectUrl = $paymentBaseUrl . '?ORDERID=' . $OrderID . '&SESSIONID=' . $SessionID . '&';

        return $redirectUrl;
    }

    public function handleRefundRequest($order_id){
        $payment = $this->paymentRepository->findByOrderId($order_id);
        $this->orderRepository->updatePaymentStatus($order_id, $this->paymentStatusRepository->findIdByType(PaymentStatus::STATUS_REFUND));

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                      <Operation>Refund</Operation>
                      <Language>'.strtoupper(app()->getLocale()).'</Language>
                      <Order>
                        <Merchant>'.$this->merchant_id.'</Merchant>
                        <OrderID>0</OrderID>
                          <Positions>
                            <Position>
                              <PaymentSubjectType>1</PaymentSubjectType>
                              <Quantity>1</Quantity>
                              <Price>13.50</Price>
                              <Tax>1</Tax>
                              <Text>name position</Text>
                              <PaymentType>2</PaymentType>
                              <PaymentMethodType>1</PaymentMethodType>
                            </Position>
                          </Positions>
                      </Order>
                      <Description>refund test</Description>
                      <SessionID>original_session_id</SessionID>
                      <Refund>
                        <Amount>refund_amount</Amount>
                        <Currency>944</Currency>
                        <WithFee>false</WithFee>
                      </Refund>
                      <Source>1</Source>
                    </Request>
                </TKKPG>';
    }

    public function approveUrl(){
        $request = request();

        $xmlmsg = new SimpleXMLElement($request->xmlmsg);

        $getPaymentRow = Payment::where('kapital_order_id', $xmlmsg->OrderID)->first();

        if($getPaymentRow){
            $getPaymentRow->update([
                'order_status' => $xmlmsg->OrderStatus,
            ]);

            $getPaymentRow->order()->update([
                'payment_status_id' => $this->paymentStatusRepository->findIdByType(PaymentStatus::STATUS_PAID)
            ]);

            $this->getOrderStatus($getPaymentRow);
        }

        return redirect()->to(env('APP_URL').'?order_status='.$xmlmsg->OrderStatus);
    }

    public function cancelUrl(){
        $request = request();
        $xmlmsg = new SimpleXMLElement($request->xmlmsg);

        $getPaymentRow = Payment::where('kapital_order_id', '=', $xmlmsg->OrderID)->first();

        if($getPaymentRow){
            $getPaymentRow->update([
                'order_status' => $xmlmsg->OrderStatus,
            ]);
        }

        return redirect()->to(env('APP_URL').'?order_status='.$xmlmsg->OrderStatus);
    }

    public function declineUrl(){
        $request = request();

        if ($request->filled('xmlmsg')){
            $xmlmsg = new SimpleXMLElement($request->xmlmsg);

            $getPaymentRow = Payment::where('kapital_order_id', '=', $xmlmsg->OrderID)->first();
            if($getPaymentRow){
                $getPaymentRow->update([
                    'order_status' => $xmlmsg->OrderStatus,
                ]);
            }
        }

        return redirect()->to(env('APP_URL').'?order_status='.$xmlmsg->OrderStatus);
    }

    private function getOrderStatus($data){
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                        <Operation>GetOrderStatus</Operation>
                        <Language>'.strtoupper(app()->getLocale()).'</Language>
                        <Order>
                            <Merchant>'.$this->merchant_id.'</Merchant>
                            <OrderID>'.$data->kapital_order_id.'</OrderID>
                        </Order>
                        <SessionID>'.$data->session_id.'</SessionID>
                    </Request>
                </TKKPG>';

        $response = $this->curl($xml);

        $xmlmsg = new SimpleXMLElement($response);

        $getPaymentRow = Payment::where('kapital_order_id', '=', $xmlmsg->Response->Order->OrderID)->first();

        if($getPaymentRow){
            $getPaymentRow->update([
                'order_check_status' => $xmlmsg->Response->Order->OrderStatus,
                'status_code' => $xmlmsg->Response->Status,
            ]);
        }

        return $response;
    }
}
