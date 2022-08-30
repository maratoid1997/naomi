<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Products\ProductDetail;
use App\Http\Resources\V1\Products\ProductList;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getLatest(): JsonResponse{
        $data = $this->productService->getLatest();

        return $this->sendResponse('Retrieved products by category', [
            'data' => $data,
            'status' => Response::HTTP_OK
        ]);
    }

    public function getDetails($productSlug): JsonResponse{
        return $this->sendResponse('Retrieved product details', [
            'data' => $this->productService->getDetails($productSlug),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getSaleProducts(): JsonResponse
    {
        return $this->sendResponse('Retrieved products by category', [
            'data' => $this->productService->getSaleProducts(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getSimilarProducts(Request $request): JsonResponse{
        $validator = Validator::make($request->all(),[
            'productSlug' => 'required|string',
        ]);

        if ($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Retrieved similar products', [
            'data' => $this->productService->getSimilarProducts($request->all()),
            'status' => Response::HTTP_OK
        ]);
    }
}
