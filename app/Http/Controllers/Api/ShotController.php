<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShotResource;
use App\Models\Shot;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShotController extends Controller
{
    public function index(){
        return ShotResource::collection(Shot::latest()->paginate(20));
    }

    public function store(Request $request){

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'tags' => 'required',
            'media' => 'required'
        ]);

        $shot = $request->user()->shots()->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        foreach ($data['media'] as $file){
            $shot->media()->create([
                'domain' => 'http://127.0.0.1:8000',
                'path' => '/storage/'.$file->store('media', 'public'),
                'mimetype' => Str::of($file->getMimeType())->before('/')
            ]);
        }

        $tags = Str::of($data['tags'])->explode(',');

        $tags->each(function ($tagname) use($shot){
            $tag = Tag::firstOrCreate(['name' => Str::of($tagname)->trim()],
                ['slug'=> Str::slug($tagname)]
            );
            $shot->tags()->attach($tag->id);
        });

        $shot->save();
        $shot->load(['media', 'tags']);

        return response()->json([
            'shot' => $shot
        ]);
    }

    public function show(Shot $shot){
        return new ShotResource($shot);
    }

}
