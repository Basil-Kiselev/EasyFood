<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoCodeRequest;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(CartService $service)
    {
        $cart = Auth::check() ? $service->getUserCart(Auth::id()) : $service->getSessionCart(Session::getId());

        return view('cart')->with('cart', $cart);
    }

    public function addToCart(CartService $service, string $article): RedirectResponse
    {
        Auth::check() ? $service->addToUserCart($article, Auth::id()) : $service->addToSessionCart($article, Session::getId());

        return back();
    }

    public function deleteCartProduct(CartService $service, string $article): RedirectResponse
    {
        Auth::check() ? $service->deleteUserCartProduct(Auth::id(), $article) : $service->deleteSessionCartProduct(Session::getId(), $article);

        return back();
    }

    public function applyCoupon(CartService $service, PromoCodeRequest $request): RedirectResponse
    {
        Auth::check() ? $service->applyPromoCodeToUserCart($request->getPromoCode(), Auth::id()) : $service->applyPromoCodeToSessionCart($request->getPromoCode(), Session::getId());

        return back();
    }
}
