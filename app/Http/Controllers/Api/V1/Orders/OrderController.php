<?php

namespace App\Http\Controllers\Api\V1\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Orders\StoreOrder;
use App\Http\Resources\V1\Orders\Coupon;
use App\Http\Resources\V1\Orders\GiftCertificate;
use App\Models\Orders\PaymentType;
use App\Models\User;
use App\Notifications\TestBroadcastNotification;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->middleware('auth:api')->only(['validateCoupon', 'getHistory']);
        $this->orderService = $orderService;
    }

    public function checkout(): JsonResponse{
        return $this->sendResponse('Retrieved checkout', [
            'data' => $this->orderService->checkout(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function storeExpress(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'productId' => 'required|numeric',
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $order = $this->orderService->storeExpress($request->all());

        $user = User::where('id',2)->first();
        Notification::sendNow($user, new TestBroadcastNotification($user, $order));


        return $this->sendResponse('Order has been placed.', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }

    public function store(StoreOrder $request)
    {
        $user = User::where('id',2)->first();

        $order = $this->orderService->store($request->details, $request->products, $request->currencyId);

        Notification::sendNow($user, new TestBroadcastNotification($user, $order));


        if($request->details['paymentType'] == PaymentType::CARD){
            return $order->gateway;
        }

        return env('APP_URL').'?order_status=APPROVED';
    }

    public function validateGiftCertificate(Request $request): JsonResponse
    {
        $validatedGiftCertificate = $this->orderService->validateGiftCertificate($request->code);

        return $this->validateGiftCoupon($request, $validatedGiftCertificate, ["code" =>['Gift certificate has been expired.']]);
    }

    public function validateCoupon(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'products' => 'required|array'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $validatedCoupon = $this->orderService->validateCoupon($request->all());


        if($validatedCoupon['status'] == Response::HTTP_UNPROCESSABLE_ENTITY){
            return $this->sendValidateResponse(["code" => [$validatedCoupon["message"]]]);
        }

        return $this->sendResponse($validatedCoupon["message"], [
            "data" => $validatedCoupon["data"],
            "status" => $validatedCoupon["status"]
        ]);
    }

    public function validateGiftCoupon($request, $validatedData, $errorMessage)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        if(!$validatedData){
            return $this->sendValidateResponse($errorMessage);
        }

        return $this->sendResponse('Data is valid.', [
            'data' => $validatedData,
            'status' => Response::HTTP_OK
        ]);
    }

    public function getHistory(){
        return $this->sendResponse('Retrieved order history.', [
            'data' => $this->orderService->getHistory(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getOrderProducts($id){
        return $this->sendResponse('Retrieved order products.', [
            'data' => $this->orderService->getOrderProducts($id),
            'status' => Response::HTTP_OK
        ]);
    }

    public function cancel(){
        return $this->orderService->cancelUrl();
    }

    public function decline(){
        return $this->orderService->declineUrl();
    }

    public function approve(){
        return $this->orderService->approveUrl();
    }

    public function refund($id){
        $this->orderService->handleRefundRequest($id);
        return $this->sendResponse('Refund request sent', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }
}
