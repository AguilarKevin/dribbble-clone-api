<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShotCollection;
use App\Http\Resources\ShotResource;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
use App\Models\Shot;
use App\Models\Tag;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){}

    public function create(){}

    public function store(Request $request){}

    public function show($tagname){
        $tag = Tag::where('slug', '=', $tagname)->get()[0];

        return new TagResource($tag);
    }

    public function edit($tag){}

    public function update(Request $request, Tag $tag){}

    public function destroy(Tag $tag){}
}
