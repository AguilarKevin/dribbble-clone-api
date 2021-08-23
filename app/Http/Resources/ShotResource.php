<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShotResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'likes' => $this->likes,
            'views' => $this->views,
            'user' => $this->user
        ];
    }
}
