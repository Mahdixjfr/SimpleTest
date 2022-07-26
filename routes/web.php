<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\User\DeliveredController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');

Route::prefix('product')->group(function () {
    Route::get('/{product}', [ProductController::class, 'product']);
    Route::get('/buy/{product}', [ProductController::class, 'buy']);
    Route::post('/buy/{product}', [ProductController::class, 'adding_to_cart']);
});
Route::middleware('auth')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show'])->name('cart');
    Route::delete('/{cart}', [CartController::class, 'delete']);
    Route::post('/', [CartController::class, 'buy']);
});
Route::middleware('auth')->prefix('comment')->group(function () {
    Route::post('/{product_id}', [CommentController::class, 'create']);
    Route::post('/like/{comment}', [CommentController::class, 'like'])->name('comment.like');
    Route::post('/dislike/{comment}', [CommentController::class, 'dislike'])->name('comment.dislike');
});

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('editProfile');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('updateProfile');
    Route::get('/favorites', [ProfileController::class, 'favorites'])->name('favorites');
    Route::post('/favorites/{id}', [ProfileController::class, 'addFavorite'])->name('addFavorite');
    Route::get('/delivered', [DeliveredController::class, 'delivered'])->middleware('auth')->name('delivered');
});

Route::middleware('auth')->prefix('seller')->group(function () {
    Route::get('/register', [SellerController::class, 'showRegisterationForm'])->name('showRegisterSeller');
    Route::post('/', [SellerController::class, 'register'])->name('registerSeller');
});
Auth::routes();
