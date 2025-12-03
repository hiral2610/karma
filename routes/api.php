<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

// Public user route
Route::get('/user', function (Request $request) {



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

// Contact Form Route
Route::post('/contacts', [ContactController::class, 'store']);

// Blogs Public Routes
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);

// Blogs Protected Route

Route::get('/blogs', [BlogController::class, 'index']);


Route::get('/blogs/{slug}', [BlogController::class, 'show']);

Route::middleware('auth:sanctum')->post('/blogs', [BlogController::class, 'store']);
}