<?php


namespace App\Repositories;

use App\Models\Categories\Category;
use App\Repositories\Contractors\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model
            ->selectRaw('
                id,
                JSON_EXTRACT(name, "$.'.app()->getLocale().'") as name,
                CONCAT("/",JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'"))) as path
            ')
            ->whereNull('parent_id')
            ->with(['children' => function($q){
                $q->selectRaw('
                    id,
                    parent_id,
                    JSON_EXTRACT(name, "$.'.app()->getLocale().'") as name,
                    JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'")) as path
                ');
            }])
            ->get()
            ->toArray();
    }

    public function getSubCategories($parentSlug){
        return $this->model
            ->whereHas('parent', function ($q) use ($parentSlug){
                $q->whereJsonContains('slug->'.app()->getLocale(),$parentSlug);
            })
            ->get();
    }

    public function hasChildren($slug){
        $category = $this->model->whereJsonContains('slug->'.app()->getLocale(),$slug)->first();
        return $category->children->count() ? true : false;
    }

    public function getBySlug($slug){
        return $this->model
            ->selectRaw('id,
                        JSON_UNQUOTE(JSON_EXTRACT(name, "$.'.app()->getLocale().'")) as title,
                        CONCAT("/",JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'"))) as path,
                        parent_id
            ')
            ->with('parent')
            ->whereJsonContains('slug->'.app()->getLocale(),$slug)
            ->first();
    }

    public function getBySlugWithLocalizations($slug){
        return $this->model
            ->selectRaw('id,
                        name as title,
                        slug as path,
                        parent_id
            ')
            ->with('parent')
            ->whereJsonContains('slug->'.app()->getLocale(),$slug)
            ->first();
    }
}
