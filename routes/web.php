<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\User\DeliveredController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
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
Route::get('/search', function () {
    dd(Product::search('u')->get());
})->name('search');

Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/{product}', 'product')->name('product');
    Route::post('/{product}', 'buy')->name('buyProduct');
});

Route::middleware('auth')->controller(CartController::class)->prefix('cart')->group(function () {
    Route::get('/', 'show')->name('cart');
    Route::delete('/{cart}', 'delete')->name('deleteCart');
    Route::post('/', 'buy');
});
Route::middleware('auth')->controller(CommentController::class)->prefix('comment')->group(function () {
    Route::post('/{product_id}', 'create');
    Route::post('/like/{comment}', 'like')->name('comment.like');
    Route::post('/dislike/{comment}', 'dislike')->name('comment.dislike');
});

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('editProfile');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('updateProfile');
    Route::get('/favorites', [ProfileController::class, 'favorites'])->name('favorites');
    Route::post('/favorites/{id}', [ProfileController::class, 'addFavorite'])->name('addFavorite');
    Route::get('/delivered', [DeliveredController::class, 'delivered'])->name('delivered');
    Route::get('/delivered/{user}/{order}', [DeliveredController::class, 'deliveredOrder'])->name('deliveredOrder');
});

Route::middleware('auth')->controller(SellerController::class)->prefix('seller')->group(function () {
    Route::get('/products', 'products')->name('sellerProducts');
    Route::get('/sold', 'sold')->name('sellerSold');
    Route::delete('/products/{product}', 'deleteProduct')->name('deleteProduct');
    Route::get('/register', 'showRegisterationForm')->name('showRegisterSeller');
    Route::post('/', 'register')->name('registerSeller');
    Route::get('/create', 'store')->name('formCreateProduct');
    Route::post('/create', 'create')->name('createProduct');
});
Auth::routes();
