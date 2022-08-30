<?php

namespace App\Http\Resources\V1\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class Wishlist extends JsonResource
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
            'wishlistId' => $this->id,
            'id' => $this->product->id,
            'name' => $this->product->name,
            'slug' => '/'.$this->product->category->parent->slug.'/'.$this->product->productSlug,
            'price' => $this->product->price,
            'inStock' => $this->inStock ? true : false,
            'sale_price' => $this->product->sale_price ?? 0,
            'isFavorite' => $this->product->isFavorite ? true : false,
            'image' => $this->product->getFirstMediaUrl('productMainImage'),
            'count' => 1
        ];
    }
}
