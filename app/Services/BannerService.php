<?php


namespace App\Services;


use App\Helpers\ActionHelper;
use App\Repositories\BannerRepository;

class BannerService
{
    use ActionHelper;

    private BannerRepository $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getAll(){
        return $this->sortBannerByTypes($this->bannerRepository->all());
    }
}
