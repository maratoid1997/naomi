<?php


namespace App\Services;
use App\Repositories\CityRepository;
use App\Repositories\LocaleRepository;

class SettingService
{
    private LocaleRepository $localeRepository;
    private CityRepository $cityRepository;

    public function __construct(
        LocaleRepository $localeRepository,
        CityRepository $cityRepository
    )
    {
        $this->localeRepository = $localeRepository;
        $this->cityRepository = $cityRepository;
    }

    public function getLocales(){
        return $this->localeRepository->all();
    }

    public function getCities(){
        return $this->cityRepository->all();
    }
}
