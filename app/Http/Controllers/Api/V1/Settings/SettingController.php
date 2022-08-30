<?php


namespace App\Http\Controllers\Api\V1\Settings;


use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    private SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function getLocales(){
        return $this->sendResponse('Retrieved locales', [
            'data' => $this->settingService->getLocales(),
            'status' => Response::HTTP_OK,
        ]);
    }

    public function getCities(){
        return $this->sendResponse('Retrieved cities', [
            'data' => $this->settingService->getCities(),
            'status' => Response::HTTP_OK,
        ]);
    }
}
