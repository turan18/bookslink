<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LoadMore;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SearchItemsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('register',[UserController::class,'store'])->middleware('guest');
Route::post('login',[SessionController::class,'store'])->middleware('guest');
Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('search', [SearchItemsController::class,'index']);
Route::get('resource/book/{title}',[SearchItemsController::class,'show']);

Route::get('partials/user',[UserController::class,'index'])->name('users');
Route::get('partials/books',[LoadMore::class,'index']);

Route::post('favorite-item',[FavoritesController::class,'store'])->middleware('auth')->name('add_to_favorites');

Route::post('review',[ReviewsController::class,'store'])->middleware('auth');
