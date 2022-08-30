<?php


namespace App\Services;


use App\Repositories\CampaignMailRepository;

class CampaignService
{
    private CampaignMailRepository $campaignMailRepository;

    public function __construct(CampaignMailRepository $campaignMailRepository)
    {
        $this->campaignMailRepository = $campaignMailRepository;
    }

    public function saveMail($email){
        return $this->campaignMailRepository->saveMail($email);
    }
}
