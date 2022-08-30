<?php


namespace App\Services;


use App\Repositories\SliderRepository;

class SliderService
{
    private SliderRepository $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getAll(){
        return $this->sliderRepository->all();
    }
}
