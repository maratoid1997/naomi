<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Currency;
use App\Services\CurrencyService;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Orkhanahmadov\CBARCurrency\CBAR;


class CurrencyController extends Controller
{
    private CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function fetch(){
        return $this->sendResponse('Retrieved current exchange rates',[
            'data' => Currency::collection($this->currencyService->getRates()),
            'status' => Response::HTTP_OK
        ]);
    }
}
