<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    private PageService $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function getPublishedPages(){
        return $this->sendResponse('Retrieved static pages', [
            'data' => $this->pageService->getPublishedPages(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getPage($slug){
        return $this->sendResponse('Retrieved static page', [
            'data' => $this->pageService->getPage($slug),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getContact(){
        return $this->sendResponse('Contact page', [
            'data' => $this->pageService->getContact(),
            'status' => Response::HTTP_OK
        ]);
    }
}
