<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsletterSubscribeController;
use App\Http\Controllers\OrderController;
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

Route::post('/login', [AuthApiController::class, 'loginUser']);
Route::post('/registration', [AuthApiController::class, 'registrationNewUser']);
Route::post('/logout', [AuthApiController::class, 'logoutUser']);

Route::post('/subscribe',[NewsletterSubscribeController::class, 'subscribeNewEmail']);

Route::post('/cart', [CartController::class, 'applyCoupon']);

Route::delete('/cart', [CartController::class, 'deleteCartProduct']);

Route::put('/cart/change-quantity', [CartController::class, 'changeQuantityCartProducts']);

Route::post('/checkout', [OrderController::class, 'createOrder']);

Route::post('/contact', [ContactsController::class, 'createMessage']);
