<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LikeResource;
use App\Http\Resources\ShotResource;
use App\Http\Resources\UserResource;
use App\Models\Like;
use App\Models\Shot;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Shot $shot, Request $request)
    {
        $shot->load(['likes']);
        $shot->likes()->toggle($request->user()->id);
        $shot->save();

        return response()->json([
            'shot'=>  $shot,
        ]);
    }
}
