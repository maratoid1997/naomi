<?php

namespace App\Http\Resources\V1\Products\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
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
            'cartId' => $this->cart_id,
            'id' => $this->product->id,
            'name' => $this->product->name,
            'slug' => '/'.$this->product->category->parent->slug.'/'.$this->product->productSlug,
            'price' => $this->product->price,
            'sku' => $this->product->sku,
            'inStock' => $this->inStock ? true : false,
            'sale_price' => $this->product->sale_price ?? 0,
            'count' => $this->quantity,
            'isFavorite' => $this->product->isFavorite ? true : false,
            'image' => $this->product->getFirstMediaUrl('productMainImage'),
        ];
    }
}
