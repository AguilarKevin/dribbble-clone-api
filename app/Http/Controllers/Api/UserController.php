<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return new UserCollection(User::latest()->paginate());
    }

    public function show(Request $request)
    {
        return new UserResource($request->user());
    }

}
