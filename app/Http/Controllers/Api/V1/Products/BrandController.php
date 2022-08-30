<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    private BrandService $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function getAll(): JsonResponse{
        return $this->sendResponse('Retrieved brands', [
            'data' => $this->brandService->getAll(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getProducts($brandId): JsonResponse
    {
        $validator = Validator::make(['brandId' => $brandId],[
            'brandId' => 'required|numeric'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Retrieved brand products', [
            'data' => $this->brandService->getProducts($brandId),
            'status' => Response::HTTP_OK
        ]);
    }
}
