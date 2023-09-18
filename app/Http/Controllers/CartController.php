<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Http\Requests\ChangeQuantityCartProductsRequest;
use App\Http\Requests\DeleteCartItemRequest;
use App\Http\Requests\PromoCodeRequest;
use App\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(CartService $service): View
    {
        $cart = Auth::check() ? $service->getUserCart(Auth::id()) : $service->getSessionCart(AuthHelper::fingerprint());

        return view('cart')->with('cart', $cart);
    }

    public function addToCart(CartService $service, string $article): RedirectResponse
    {
        Auth::check() ? $service->addToUserCart($article, Auth::id()) : $service->addToSessionCart($article, AuthHelper::fingerprint());

        return back();
    }

    public function changeQuantityCartProducts(CartService $service, ChangeQuantityCartProductsRequest $request): JsonResponse
    {
        $result = $service->changeQuantityCartProducts($request->getCartId(), $request->getType(), $request->getArticle());

        return new JsonResponse(['message' => $result]);
    }

    public function deleteCartProduct(CartService $service, DeleteCartItemRequest $request): JsonResponse
    {
        $result = $service->deleteCartProduct($request->getCartId(), $request->getArticle());

        return new JsonResponse(['message' => $result]);
    }

    public function applyCoupon(CartService $service, PromoCodeRequest $request): JsonResponse
    {
        $result = $service->applyPromoCodeToCart($request->getPromoCode(), $request->getCartId());

        return new JsonResponse(['message' => $result]);
    }
}
