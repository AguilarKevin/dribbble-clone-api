<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\ShotController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', [UserController::class, 'show'])->middleware('auth:sanctum');

Route::post('/uploads/new', [ShotController::class, 'store'])->middleware('auth:sanctum');

Route::get('/shots', [ShotController::class, 'index']);

Route::get('/shots/{shot}', [ShotController::class, 'show']);

Route::post('/shots/{shot}', [LikeController::class, 'toggle'])->middleware('auth:sanctum');

Route::get('/tags/{tagname}', [TagController::class, 'show']);
