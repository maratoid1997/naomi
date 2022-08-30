<?php


namespace App\Services;


use App\Repositories\ContactRepository;
use App\Repositories\PageRepository;
use App\Helpers\Cache as CacheX;
use Illuminate\Support\Facades\DB;

class PageService
{
    private PageRepository $pageRepository;
    private ContactRepository $contactRepository;

    public function __construct(PageRepository $pageRepository, ContactRepository $contactRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->contactRepository = $contactRepository;
    }

    public function getPublishedPages(){
        return $this->pageRepository->getPublishedPages();
    }

    public function getPage($slug){
        $cacheKey = \CacheHelper::PAGES.':'.$slug.'.locale:'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }
        $slugs = $this->pageRepository->getBySlugWithLocalizations($slug);

        $page = $this->pageRepository->getBySlug($slug);
        $data = [
            'page' => $this->pageRepository->getBySlug($slug),
            'slugs' => $this->mapSlug(json_decode($slugs->path)),
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => $page->name,
                    'to' => $page->path
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    public function getContact(){
        $cacheKey = \CacheHelper::PAGES.'.contact.'.app()->getLocale();

        if (\CacheHelper::has($cacheKey)){
            return \CacheHelper::get($cacheKey);
        }

        $data = [
            'page' => $this->contactRepository
                ->getSingle()
                ->setAttribute('companyInfo',strip_tags($this->pageRepository->getCompanyInfo()->body)),
            'breadcrumbs' => [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.contact'),
                    'to' => '/contact'
                ],
            ]
        ];

        return \CacheHelper::remember($cacheKey, json_encode($data));
    }

    private function mapSlug($slug){
        $mappedSlug = [];
        $locales = DB::table('locales')->select('code')->get();

        foreach ($locales as $locale){
            $code = $locale->code;

            $mappedSlug[$locale->code] = '/'.$slug->$code;
        }

        return $mappedSlug;
    }
}
