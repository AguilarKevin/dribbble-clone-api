<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\ShotController;
use App\Http\Controllers\TagController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::post('/uploads/new', [ShotController::class, 'store'])->middleware('auth:sanctum');

Route::get('/uploads', [AuthController::class, 'index']);

Route::get('/tags/{tag}', [TagController::class, 'index']);
