<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LoadMore;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SearchItemsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserVoteController;
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
Route::get('dashboard',[DashboardController::class,'index'])->middleware('auth');

Route::get('partials/user',[UserController::class,'index'])->name('users');
Route::get('partials/books',[LoadMore::class,'index']);
Route::get('partials/share',[ShareController::class,'index'])->middleware('auth');
Route::get('partials/recommend',[DashboardController::class,'show'])->middleware('auth')->name('recommended');

Route::post('favorite-item',[FavoritesController::class,'store'])->middleware('auth')->name('add_to_favorites');
Route::post('unfavorite-item',[FavoritesController::class,'destroy'])->middleware('auth')->name('remove_from_favorites');
Route::post('share',[ShareController::class,'store'])->middleware('auth');

Route::post('review',[ReviewsController::class,'store'])->middleware('auth');
Route::post('follow',[FollowController::class,'store'])->middleware('auth');
Route::post('unfollow',[FollowController::class,'destroy'])->middleware('auth');


Route::get('profile',[DashboardController::class,'profile'])->middleware('auth');
Route::get('favorites',[DashboardController::class,'favorites'])->middleware('auth');
Route::get('shared',[DashboardController::class,'shared'])->middleware('auth');
Route::get('followers',[DashboardController::class,'followers'])->middleware('auth');
Route::get('following',[DashboardController::class,'following'])->middleware('auth');

Route::post('avatar',[UserController::class,'update'])->middleware('auth');
Route::post('aboutme',[UserController::class,'update'])->middleware('auth');


Route::post('notification/read',[NotificationController::class,'update'])->middleware(('auth'));
Route::post('notification/remove',[NotificationController::class,'destroy'])->middleware(('auth'));

Route::post('review/like',[UserVoteController::class,'update'])->middleware(('auth'));
Route::post('review/dislike',[UserVoteController::class,'update'])->middleware(('auth'));
