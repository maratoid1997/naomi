<?php

namespace App\Imports;

use App\Models\Categories\Category;
use App\Models\Products\Brand;
use App\Models\Products\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = Brand::query();
        $category = Category::query();

        $brand->firstOrCreate(['name' => $row['brand']], ['name' => $row['brand']]);
        $category->firstOrCreate(['name' => $row['brand']], ['name' => $row['brand']]);

        return new Product([
            //
        ]);
    }
}
