<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Products\ProductList;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    private WishlistService $wishlistService;
    public function __construct(WishlistService $wishlistService)
    {
        $this->middleware('auth:api')->except(['getCustomerWishlist']);
        $this->wishlistService = $wishlistService;
    }

    public function getCustomerWishlist(){
        return $this->sendResponse('Retrieved wishlist',[
            'data' => $this->wishlistService->getByCustomerId(),
            'status' => Response::HTTP_CREATED
        ]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'userId' => 'required',
            'productId' => 'required|unique:wishlist,product_id,NULL,id,customer_id,'.$request->userId,
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Added to wishlist',[
            'data' => new ProductList($this->wishlistService->save([
                'productId' => $request->productId,
                'customerId' => $request->userId,
            ])),
            'status' => Response::HTTP_CREATED
        ]);
    }

    public function delete($productId, Request $request){
        $validator = Validator::make(
            [
                'product_id' => $productId,
                'userId' => $request->userId
            ],
            [
            'product_id' => 'required|numeric|exists:wishlist',
            'userId' => 'required|numeric'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $this->wishlistService->delete($productId, $request->userId);

        return $this->sendResponse('Deleted from wishlist',[
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }

    public function sync(Request $request){
        $validator = Validator::make(['products' => $request->all()],[
            'products' => 'required|array'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());


        return $this->sendResponse('Synchronized wishlist',[
            'data' => $this->wishlistService->sync($request->all()),
            'status' => Response::HTTP_OK
        ]);
    }
}
