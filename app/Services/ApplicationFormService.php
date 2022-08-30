<?php


namespace App\Services;


use App\Repositories\ApplicationFormRepository;

class ApplicationFormService
{
    private ApplicationFormRepository $applicationFormRepository;

    public function __construct(ApplicationFormRepository $applicationFormRepository)
    {
        $this->applicationFormRepository = $applicationFormRepository;
    }

    public function save($data){
        return $this->applicationFormRepository->save(null, $data);
    }
}
