<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
Route::get('/', function () {
    return view('welcome');
    
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

});

