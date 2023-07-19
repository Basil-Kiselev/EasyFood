<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\UserFavoriteProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainPageController::class, 'index'])->name('home');

Route::get('/search', [SearchProductController::class, 'index'])->name('search');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', [AuthController::class, 'createUser']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/product/{article}', [ProductController::class, 'index'])->name('product');

Route::middleware('auth')->group(function () {
    Route::get('/add-favorite/{productArticle}', [UserFavoriteProductController::class, 'addToFavorite'])->name('add-favorite');
    Route::post('/delete-favorite/{productArticle}', [UserFavoriteProductController::class, 'removeFromFavorite'])->name('delete-favorite');
    Route::get('/favorites', [UserFavoriteProductController::class, 'index'])->name('favorites');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/cart/{article}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');

Route::post('/checkout', [OrderController::class, 'createOrder']);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');
