<?php


namespace App\Services;


use App\Models\Currency;
use App\Repositories\CurrencyRepository;

class CurrencyService
{
    private CurrencyRepository $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function updateRates(){
        $currencies = [
            Currency::USD,
            Currency::RUB,
        ];

        foreach ($currencies as $currency){
            $code = strtoupper($currency);
            $this->currencyRepository->updateRate($currency, cbar()->$code);
        }
    }

    public function getRates(){
        return $this->currencyRepository->all();
    }
}
