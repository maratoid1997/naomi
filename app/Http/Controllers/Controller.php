<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendValidateResponse($errorMessages): JsonResponse
    {
        return response()->json(
            [
                'errors' => $errorMessages
            ],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    public function sendResponse($message, $credentials): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $credentials['data']
        ], $credentials['status']);
    }
}
