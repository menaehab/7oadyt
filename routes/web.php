<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

Route::get("/",[HomeController::class,"index"])->name("home");
Route::get("/browse/{type?}",[BrowseController::class,"index"])->name("browse");
Route::get("/blog/browse/",[BrowseController::class,"blogs"])->name("browse.blogs");
Route::get('/search', [ContentController::class, 'search'])->name('contents.search');
Route::get('/category/{slug}',[ContentController::class,'contentsByCategory'])->name('contents.category');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {

        Route::get("/show/{slug}",[BrowseController::class,"show"])->name("show");
        Route::get("/blog/show/{slug}",[BrowseController::class,"blogShow"])->name("browse.blogs.show");

        Route::post('contents/review/create', [ReviewController::class, 'store'])->name('reviews.store');
        Route::delete('contents/review/{review}', [ReviewController::class,'destroy'])->name('reviews.destroy');

        Route::get('quiz/{slug}', [QuizController::class, 'index'])->name('quiz.index');
        Route::post('quiz/{slug}', [QuizController::class, 'submit'])->name('quiz.submit');

        Route::prefix('dashboard')->middleware('role:admin')->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('contents',ContentController::class);
            Route::resource('blogs', BlogController::class);
    });
});