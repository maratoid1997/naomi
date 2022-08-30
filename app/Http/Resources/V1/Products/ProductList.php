<?php

namespace App\Http\Resources\V1\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductList extends JsonResource
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
            'name' => $this->title,
            'slug' => '/'.$this->category->parent->slug.'/'.$this->slug,
            'price' => $this->price,
            'sku' => $this->sku,
            'sale_price' => $this->sale_price ?? 0,
            'inStock' => $this->inStock ? true : false,
            'isFavorite' => $this->isFavorite ? true : false,
            'image' => $this->getFirstMediaUrl('productMainImage'),
            'count' => 1
        ];
    }
}
