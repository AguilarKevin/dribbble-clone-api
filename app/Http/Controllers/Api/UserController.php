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

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        return new UserResource($request->user());
    }

    public function update(Request $request, User $user)
    {

    }

    public function destroy(User $user)
    {
        //
    }
}
