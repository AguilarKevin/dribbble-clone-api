<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShotResource;
use App\Models\Shot;
use Illuminate\Http\Request;

class ShotController extends Controller
{
    public function index(){
        return ShotResource::collection(Shot::latest()->paginate(20));
    }

    public function create(){}

    public function store(Request $request)
    {
        $shot = new Shot();
        $shot->user_id = $request->user()->id;
        $shot->views = 0;
        $shot->likes = 0;

        $image = $request->file('image');
        $shot->image = 'http://127.0.0.1:8000/storage/'.$image->store('image', 'public');
        $shot->save();


        return response()->json([
            'image' => $shot->image,
            'user_id' => $shot->user_id,
        ]);
    }

    public function show(Shot $shot){}

    public function edit(Shot $shot){}

    public function update(Request $request, Shot $shot){}

    public function destroy(Shot $shot){}
}
