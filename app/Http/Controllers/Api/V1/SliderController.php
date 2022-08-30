<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Sliders\Slider;
use App\Services\SliderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class SliderController extends Controller
{
    private SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function getAll(): JsonResponse
    {
        return $this->sendResponse('Retrieved hero slider', [
            'data' => Slider::collection($this->sliderService->getAll()),
            'status' => Response::HTTP_OK
        ]);
    }
}
