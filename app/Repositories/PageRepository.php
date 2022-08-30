<?php


namespace App\Repositories;

use App\Models\Page;

class PageRepository extends BaseRepository
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function getPublishedPages(){
        return $this->model
            ->selectRaw('
                id,
                JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                JSON_UNQUOTE(JSON_EXTRACT(description, "$.'.app()->getLocale().'")) as body,
                CONCAT("/",JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'"))) as path
            ')
            ->where('published',Page::PUBLISHED)
            ->whereJsonDoesntContain('slug->'.app()->getLocale(), Page::PAGE_COMPANY_INFO_SLUG)
            ->whereJsonDoesntContain('slug->'.app()->getLocale(), Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_AZ)
            ->whereJsonDoesntContain('slug->'.app()->getLocale(), Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_EN)
            ->whereJsonDoesntContain('slug->'.app()->getLocale(), Page::PAGE_SHIPPING_AND_PAYMENT_SLUG_RU)
            ->get();
    }

    public function getBySlug($slug){
        return $this->model
            ->selectRaw('
                id,
                JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                JSON_UNQUOTE(JSON_EXTRACT(description, "$.'.app()->getLocale().'")) as body,
                CONCAT("/",JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'"))) as path
            ')
            ->whereJsonContains('slug->'.app()->getLocale(), $slug)
            ->where('published', Page::PUBLISHED)
            ->first();
    }

    public function getBySlugWithLocalizations($slug){
        return $this->model
            ->selectRaw('slug as path')
            ->whereJsonContains('slug->'.app()->getLocale(), $slug)
            ->where('published', Page::PUBLISHED)
            ->first();
    }

    public function getCompanyInfo(){
        return $this->model
            ->selectRaw('
                JSON_UNQUOTE(JSON_EXTRACT(description, "$.'.app()->getLocale().'")) as body
            ')
            ->whereJsonContains('slug->'.app()->getLocale(), Page::PAGE_COMPANY_INFO_SLUG)
            ->where('published', Page::PUBLISHED)
            ->first();
    }
}
