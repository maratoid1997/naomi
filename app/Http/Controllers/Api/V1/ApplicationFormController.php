<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreApplicationForm;
use App\Services\ApplicationFormService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApplicationFormController extends Controller
{
    private ApplicationFormService $applicationFormService;

    public function __construct(ApplicationFormService $applicationFormService)
    {
        $this->applicationFormService = $applicationFormService;
    }

    public function send(StoreApplicationForm $request){
        $this->applicationFormService->save($request->all());
        return $this->sendResponse('Message has sent', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }
}
