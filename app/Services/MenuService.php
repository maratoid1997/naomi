<?php


namespace App\Services;


use App\Http\Resources\V1\Settings\Menu;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Helpers\Cache as CacheX;

class MenuService
{
    private CategoryRepository $categoryRepository;
    private MenuRepository $menuRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        MenuRepository $menuRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->menuRepository = $menuRepository;
    }

    public function getHeaderMenu(){
//        $cacheKey = 'menus.header.'.app()->getLocale();

        $categories = $this->categoryRepository->all();
        $menus = Menu::collection($this->menuRepository->getHeaderMenu());
        $menus = json_decode($menus->toJson());

        array_unshift($menus, ['name' => __('nav.products'), 'children' => $categories]);

        return $menus;
    }
}
