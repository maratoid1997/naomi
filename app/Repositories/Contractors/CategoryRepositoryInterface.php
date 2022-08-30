<?php


namespace App\Repositories\Contractors;


interface CategoryRepositoryInterface
{
    public function getSubCategories($parentId);
}
