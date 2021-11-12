<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'shots' => new ShotCollection($this->shots()->latest()->paginate(10)),
        ];
    }
}
