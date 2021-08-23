<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShotCollection extends ResourceCollection
{
    public $collects = ShotResource::class;

    public function toArray($request)
    {
        return parent::toArray($this->collects);
    }
}
