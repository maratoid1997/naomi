<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CampaignMailController extends Controller
{
    private CampaignService $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $this->campaignService->saveMail($request->email);
        return $this->sendResponse('Mail sent', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }
}
