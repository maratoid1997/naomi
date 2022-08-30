<?php


namespace App\Nova\Actions;

use App\Models\Products\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportProducts extends DownloadExcel implements WithMapping, WithHeadings
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'title',
            'price',
            'sale_price',
            'quantity',
            'brand',
            'category',
            'color',
            'product_code',
            'filters'
        ];
    }

    /**
     * @param $order
     *
     * @return array
     */
    public function map($product): array
    {
        $filters = [];
        foreach ($product->filters as $filter) {
            $filters[] = $filter->name;
        }

        return [
            $product->id,
            $product->title,
            $product->price,
            $product->sale_price,
            $product->quantity,
            $product->brand->name,
            $product->category->name,
            $product->color->name,
            $product->sku,
            $filters
        ];
    }
}
