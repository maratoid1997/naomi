<?php


namespace App\Repositories;

use App\Models\ApplicationForm;

class ApplicationFormRepository extends BaseRepository
{
    public function __construct(ApplicationForm $model)
    {
        parent::__construct($model);
    }
}
