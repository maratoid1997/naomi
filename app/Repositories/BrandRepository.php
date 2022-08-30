<?php


namespace App\Repositories;

use App\Repositories\Contractors\BrandRepositoryInterface;
use App\Models\Products\Brand;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}
