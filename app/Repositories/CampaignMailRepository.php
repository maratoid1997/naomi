<?php


namespace App\Repositories;

use App\Models\CampaignMail;


class CampaignMailRepository extends BaseRepository
{
    public function __construct(CampaignMail $model)
    {
        parent::__construct($model);
    }

    public function saveMail($email)
    {
        return $this->model->updateOrCreate(['email' => $email], ['email' => $email]);
    }
}
