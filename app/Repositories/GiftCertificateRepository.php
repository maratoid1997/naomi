<?php


namespace App\Repositories;

use App\Models\Orders\GiftCertificate;
use Carbon\Carbon;

class GiftCertificateRepository extends BaseRepository
{
    public function __construct(GiftCertificate $model)
    {
        parent::__construct($model);
    }

    public function validate($code){
        return $this->model->select('id','code','price')
            ->where('code', $code)
            ->where('end_date', '>', Carbon::now(),)
            ->first();
    }
}
