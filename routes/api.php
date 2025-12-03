<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});


Route::get('/blogs', [BlogController::class, 'index']);


Route::get('/blogs/{slug}', [BlogController::class, 'show']);

Route::middleware('auth:sanctum')->post('/blogs', [BlogController::class, 'store']);
