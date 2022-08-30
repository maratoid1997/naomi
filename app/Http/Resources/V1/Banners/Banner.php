<?php

namespace App\Http\Resources\V1\Banners;

use Illuminate\Http\Resources\Json\JsonResource;

class Banner extends JsonResource
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
            'title' => $this->name,
            'url' => $this->url,
            'image' => $this->getFirstMediaUrl('bannerImages')
        ];
    }
}
