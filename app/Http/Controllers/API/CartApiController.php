<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddItemToCartRequest;
use App\Http\Requests\PromoCodeRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Services\CartService;

class CartApiController extends Controller
{
    public function getCart(CartService $service): CartResource
    {
        $cartDTO = auth('sanctum')->check() ? $service->composeCartDto($service->getUserCart(auth('sanctum')->id())) : $service->composeCartDto($service->getSessionCart(AuthHelper::fingerprint()));

        return new CartResource($cartDTO);
    }

    public function addItemToCart(AddItemToCartRequest $request, CartService $service): CartResource
    {
        $itemAlias = $request->getProductAlias();
        $cartDTO = auth('sanctum')->check() ? $service->composeCartDto($service->addToUserCart($itemAlias, auth('sanctum')->id())) : $service->composeCartDto($service->addToSessionCart($itemAlias, AuthHelper::fingerprint()));

        return new CartResource($cartDTO);
    }

    public function applyCoupon(CartService $service, PromoCodeRequest $request): CartResource
    {
        $cart = auth('sanctum')->check() ? $service->getUserCart(auth('sanctum')->id()) : $service->getSessionCart(AuthHelper::fingerprint());
        $service->applyPromoCodeToCart($request->getPromoCode(), $cart);

        return new CartResource($service->composeCartDto($cart));
    }
}
