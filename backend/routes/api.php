<?php

use App\Http\Controllers\API\ArticleApiController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CartApiController;
use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\API\ContactsApiController;
use App\Http\Controllers\API\OrderApiController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\SettingsApiController;
use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/registration', [AuthApiController::class, 'register']);
Route::post('/logout', [AuthApiController::class, 'logout']);

Route::get('/settings', [SettingsApiController::class, 'getSettings']);

Route::get('/categories', [CategoryApiController::class, 'getCategories']);

Route::get('/products', [ProductApiController::class, 'getProducts']);

Route::get('/products/search', [ProductApiController::class, 'searchProducts']);

Route::get('/products/recommended', [ProductApiController::class, 'getRecommendedProducts']);

Route::get('/products/{alias}', [ProductApiController::class, 'getProduct']);

Route::get('/articles', [ArticleApiController::class, 'getArticles']);

Route::get('/articles/search', [ArticleApiController::class, 'searchArticles']);

Route::get('/articles/{alias}', [ArticleApiController::class, 'getArticle']);

Route::get('/article-categories', [ArticleApiController::class, 'getArticleCategories']);

Route::get('/cart', [CartApiController::class, 'getCart']);

Route::post('/cart/items', [CartApiController::class, 'addItemToCart']);

Route::delete('/cart/items', [CartApiController::class, 'deleteItemFromCart']);

Route::patch('/cart/items', [CartApiController::class, 'changeQuantityCartProducts']);

Route::post('/cart/coupon', [CartApiController::class, 'applyCoupon']);

Route::post('/cart/checkout', [OrderApiController::class, 'createOrder']);

Route::post('/subscribe',[ContactsApiController::class, 'subscribeNewEmail']);

Route::post('/feedback', [ContactsApiController::class, 'sendFeedbackMessage']);

Route::get('/user/favorites', [ProductApiController::class, 'getUserFavoriteProducts']);

Route::post('/user/favorites', [ProductApiController::class, 'addToUserFavoriteProducts']);

Route::delete('/user/favorites', [ProductApiController::class, 'removeProductFromFavorite']);

Route::get('/user/info', [UserApiController::class, 'getUserInfo']);
