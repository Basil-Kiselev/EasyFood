<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\CartService;

class CartApiController extends Controller
{
    public function getCart(CartService $service)
    {
        $cart = auth('sanctum')->check() ? $service->getUserCart(auth('sanctum')->id()) : $service->getSessionCart(AuthHelper::fingerprint());

        return new CartResource($cart);
    }
}
