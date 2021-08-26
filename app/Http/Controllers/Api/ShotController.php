<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShotResource;
use App\Models\Shot;
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
            'description' => 'required',
            'tags' => 'required',
            'media' => 'required'
        ]);

        $shot = $request->user()->shots()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'views' => 0,
            'saves' => 0,
            'likes' => 0
        ]);

        $tags = Str::of($data['tags'])->explode(',');

        $tags->each(function ($tag) use($shot){
            $shot->tags()->create(['name' => $tag, 'slug' => Str::slug($tag)]);
        });

        $media = $request->file('media');

        foreach ($media as $file){
            $shot->media()->create([
                'domain' => 'http://127.0.0.1:8000',
                'path' => $file->store('media', 'public'),
                'mimetype' => $file->getMimeType()
            ]);
        }

        $shot->save();
        $shot->load('media');

        return response()->json([
            'shot' => $shot
        ]);
    }

    public function show(Shot $shot){
        return new ShotResource($shot);
    }

}
