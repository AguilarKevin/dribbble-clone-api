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
            'saves' => $this->saves,
            'created_at' => $this->created_at,
            'tags' => new ShotTagsCollection($this->tags),
            'user' => new UserResource($this->user)
        ];
    }
}
