<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Categories\Category;
use App\Http\Resources\V1\Products\ProductList;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getSubCategories($parentSlug): JsonResponse{
        $subcategories = $this->categoryService->getSubCategories($parentSlug, true);
        return $this->sendResponse('Retrieved sub categories', [
            'data' => $subcategories,
            'status' => Response::HTTP_OK
        ]);
    }

    public function getFilterValues($slug): JsonResponse{
        $subcategories = $this->categoryService->getSubCategories($slug, false);
        return $this->sendResponse('Retrieved  filter values', [
            'data' => $subcategories,
            'status' => Response::HTTP_OK
        ]);
    }
}
