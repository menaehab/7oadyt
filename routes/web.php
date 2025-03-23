<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

Route::get("/",[HomeController::class,"index"])->name("home");
Route::get("/browse/{type?}",[BrowseController::class,"index"])->name("browse");
Route::get("/show/{slug}",[BrowseController::class,"show"])->name("show");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('contents',ContentController::class);
    });
});
