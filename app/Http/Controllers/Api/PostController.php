<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = $request->user()->id;
        $post->views = 0;
        $post->likes = 0;

        $image = $request->file('image');
        $post->image = 'http://127.0.0.1:8000/storage/'.$image->store('image', 'public');
        $post->save();


        return response()->json([
            'image' => $post->image,
            'user_id' => $post->user_id,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
