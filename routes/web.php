<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

Route::get("/",[HomeController::class,"index"])->name("home");
Route::get("/browse/{type?}",[BrowseController::class,"index"])->name("browse");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {

    Route::get("/show/{slug}",[BrowseController::class,"show"])->name("show");

    Route::post('contents/review/create', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('contents/review/{content}', [ReviewController::class,'destroy'])->name('reviews.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('contents',ContentController::class);
    });
});
