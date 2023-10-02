<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddItemToCartRequest;
use App\Http\Resources\CartResource;
use App\Services\CartService;

class CartApiController extends Controller
{
    public function getCart(CartService $service): CartResource
    {
        $cart = auth('sanctum')->check() ? $service->getUserCart(auth('sanctum')->id()) : $service->getSessionCart(AuthHelper::fingerprint());

        return new CartResource($cart);
    }

    public function addItemToCart(AddItemToCartRequest $request, CartService $service): CartResource
    {
        $itemAlias = $request->getProductAlias();
        $cart = auth('sanctum')->check() ? $service->composeCartDto($service->addToUserCart($itemAlias, auth('sanctum')->id())) : $service->composeCartDto($service->addToSessionCart($itemAlias, AuthHelper::fingerprint()));

        return new CartResource($cart);
    }
}
