<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LikeCollection extends ResourceCollection
{
    public $collects = LikeResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
