<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    private MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function getHeaderMenu(){
        return $this->sendResponse('Header menu', [
            'data' => $this->menuService->getHeaderMenu(),
            'status' => Response::HTTP_OK
        ]);
    }
}
