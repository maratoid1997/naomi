<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\Filter;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    private ProductService $productService;
    private CategoryService $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function filter(Filter $request){
        if($request->refresh){
            $data = $this->categoryService->getSubCategories($request->category, false);
        }else{
            $data = $this->productService->filter($request->all());
        }
        return $this->sendResponse('Retrieved filter values', [
            'data' => $data,
            'status' => Response::HTTP_OK
        ]);
    }

    public function search(Request $request){
        $validator = Validator::make($request->all(), [
            'q' => 'required|string'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        return $this->sendResponse('Retrieved search results', [
            'data' => $this->productService->search($request->q),
            'status' => Response::HTTP_OK
        ]);
    }
}
