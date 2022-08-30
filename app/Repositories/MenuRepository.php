<?php


namespace App\Repositories;

use App\Repositories\Contractors\MenuRepositoryInterface;
use App\Models\Menu;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    public function getHeaderMenu()
    {
        return $this->model->where('section', Menu::SECTION_HEADER)->orderBy('sort_order')->get();
    }
}
