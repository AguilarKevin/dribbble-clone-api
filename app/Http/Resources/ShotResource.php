<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShotResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'media' => $this->media,
            'likes' => $this->likes,
            'views' => $this->views,
            'tags' => $this->tags,
            'user' => $this->user
        ];
    }
}
