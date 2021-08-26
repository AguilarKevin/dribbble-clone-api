<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShotTagsCollection extends ResourceCollection
{
    public $collects = ShotTagsResource::class;
    public function toArray($request)
    {
        return parent::toArray($this->collects);
    }
}
