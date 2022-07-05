<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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

Route::prefix('product')->group(function () {
    Route::get('/{product}', [ProductController::class, 'product']);
    Route::get('/buy/{product}', [ProductController::class, 'buy']);
    Route::post('/buy/{product}', [ProductController::class, 'adding_to_cart']);
});
Route::middleware('auth')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show']);
    Route::delete('/{cart}', [CartController::class, 'delete']);
    Route::post('/', [CartController::class, 'buy']);
});
Auth::routes();
