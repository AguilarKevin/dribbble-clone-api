<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->user_id)
        ];
    }
}
