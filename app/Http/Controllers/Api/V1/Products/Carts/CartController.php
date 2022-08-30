<?php

namespace App\Http\Controllers\Api\V1\Products\Carts;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Products\Cart\Cart;
use App\Http\Resources\V1\Products\ProductList;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    private CartService $cartService;
    private ProductService $productService;

    public function __construct(CartService $cartService, ProductService $productService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
        $this->middleware('auth:api')->except(['getCart']);
    }

    public function store(Request $request): JsonResponse{
        $cartId = $this->cartService->getIdByCustomer($request->userId);

        $validator = Validator::make($request->all(),[
            'productId' => 'required|numeric|unique:cart_items,product_id,NULL,id,cart_id,'.$cartId,
            'qty' => 'required|numeric',
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Added product to cart', [
            'data' => $this->cartService->save($request->all()),
            'status' => Response::HTTP_OK
        ]);
    }

    public function updateQuantity(Request $request): JsonResponse{

        $validator = Validator::make([
                'customerId' => $request->userId,
                'qty' => $request->qty,
                'productId' => $request->productId
            ],
            [
            'productId' => 'required|numeric|min:0|gt:0',
            'qty' => 'required|numeric|min:0|gt:0|lt:'.$this->productService->getQuantity($request->productId),
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $this->cartService->updateQuantity($request->all());

        return $this->sendResponse('Updated quantity', [
            'data' => [],
            'status' => Response::HTTP_CREATED
        ]);
    }

    public function deleteItem($productId, Request $request): JsonResponse
    {
        $validator = Validator::make(
            [
                'product_id' => $productId,
                'userId' => $request->userId
            ],
            [
                'product_id' => 'required|numeric|exists:cart_items',
                'userId' => 'required|numeric'
            ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $this->cartService->deleteItem($productId, $request->userId);

        return $this->sendResponse('Cart item deleted', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }

    public function getCart(): JsonResponse
    {
        $cart = $this->cartService->getCart();
        return $this->sendResponse('Retrieved cart items', [
            'data' => $cart,
            'status' => Response::HTTP_OK
        ]);
    }

    public function sync(Request $request): JsonResponse
    {
        $validator = Validator::make(['products' => $request->all()],[
            'products' => 'required|array'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Synchronized cart items',[
            'data' =>  $this->cartService->sync($request->all()),
            'status' => Response::HTTP_OK
        ]);
    }
}
