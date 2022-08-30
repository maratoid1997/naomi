<?php

namespace App\Http\Resources\V1\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => '/'.$this->productSlug,
            'description' => $this->productDesc,
            'price' => doubleval($this->price),
            'sale_price' => doubleval($this->sale_price),
            'inStock' => $this->inStock ? true : false,
            'sku' => $this->sku,
            'brand' => [
                'id' => $this->brand->id,
                'name' => $this->brand->name,
            ],
            'isFavorite' => $this->isFavorite ? true : false,
            'image' => $this->getFirstMediaUrl('productMainImage'),
            'imageList' => $this->imageList,
            'count' => 1,
            'filters' => $this->filters
        ];
    }
}
