<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    private BannerService $bannerService;
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function getAll(){
        return $this->sendResponse('Banners', [
            'data' => $this->bannerService->getAll(),
            'status' => Response::HTTP_OK
        ]);
    }
}
