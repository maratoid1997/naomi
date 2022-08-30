<?php

namespace App\Helpers;

use App\Http\Resources\V1\Banners\Banner;
use App\Models\Orders\GiftCertificate;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait ActionHelper
{
    public $menus = [];
    public $level = 0;

    public function getMenus($resourceId, $model){
        $this->resourceId = $resourceId;

        $menus = $model::where('parent_id', null)
            ->with('children')
            ->orderBy('id')
            ->get();

        $this->recursiveMenu($menus, 0,$resourceId);

        return $this->menus;
    }

    public function recursiveMenu($menus, $level, $resourceId){
        $model = request()->segments()[1];

        foreach ($menus as $key => $menu) {
            if ($menu->id == $resourceId && $model != 'products') continue;

            $this->menus[$menu->id] = str_repeat('—', $level).' '.$menu->name;

            if($menu->children->count() > 0){
                $this->level++;
                $this->recursiveMenu($menu->children, $this->level, $resourceId);
            }
            if (!isset($menus[$key+1])) {
                $this->level--;
            }
        }
    }

    public function getMenusOptGroup($resourceId, $model){
        $this->resourceId = $resourceId;

        $menus = $model::where('parent_id', null)
            ->with('children')
            ->orderBy('id')
            ->get();


        $this->recursiveOptGroup($menus, null);

        return $this->menus;
    }

    public function recursiveOptGroup($menus, $parentName = null){
        foreach ($menus as $key => $menu) {
            $this->menus[$menu->id] = ['label' => $menu->name, 'group' => $parentName];

            if($menu->children->count() > 0){
                unset($this->menus[$menu->id]);
                $this->recursiveOptGroup($menu->children, $menu->name);
            }
            elseif($this->menus[$menu->id]['group'] == null){
                unset($this->menus[$menu->id]);
            }
        }
    }

    public function getSpatieImageUrls($imageList): array
    {
        $images = [];
        foreach ($imageList as $image){
            $images[] = $image->getUrl();
        }

        return $images;
    }

    public function sortBannerByTypes($data, $excludeType=null): array
    {
        $typeS = strtolower(\App\Models\Banner::TYPE_SMALL);
        $typeM = strtolower(\App\Models\Banner::TYPE_MEDIUM);
        $typeL = strtolower(\App\Models\Banner::TYPE_LARGE);
        $banners[$typeS] = [];
        $banners[$typeM] = [];
        $banners[$typeL] = [];

        foreach ($data as $banner){
            $banners[strtolower($banner->type)][] = Banner::make($banner);
        }
        unset($banners[strtolower($excludeType)]);
        return $banners;
    }

    public function mapTaxes($taxes): array
    {
        $mapData = [];

        foreach ($taxes as $tax){
            $mapData[$tax['name']] = doubleval($tax['rate']);
        }

        return $mapData;
    }

    public function getPageNumber(){
        $request = request()->all();
        return $request ? isset($request['page']) : 1;
    }
}
