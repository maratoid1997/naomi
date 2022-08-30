<?php


namespace App\Repositories;

use App\Models\Banner;
use Carbon\Carbon;

class BannerRepository extends BaseRepository
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function all(){
        $now = Carbon::now();
        return $this->model
            ->selectRaw('
                id,
                JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                type,
                url
            ')
            ->where('start_date', '<', $now)
            ->where('end_date', '>', $now)
            ->where('published', 1)
            ->orderBy('type')
            ->get()
        ;
    }
}
