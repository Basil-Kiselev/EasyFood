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
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(CartService $service): View
    {
        $cartData = Auth::check() ?
            $service->composeCartDto($service->getUserCart(Auth::id())) :
            $service->composeCartDto($service->getSessionCart(AuthHelper::fingerprint()));

        return view('cart')->with('cart', $cartData);
    }

    public function addToCart(CartService $service, string $article): RedirectResponse
    {
        Auth::check() ?
            $service->addToUserCart($article, Auth::id()) :
            $service->addToSessionCart($article, AuthHelper::fingerprint());

        return back();
    }

    public function changeQuantityCartProducts(CartService $service, ChangeQuantityCartProductsRequest $request): JsonResponse
    {
        $fingerprint = Session::get('fingerprint');
        $userId = Session::get('user_id');

        $result = $service->changeQuantityCartProducts($request->getType(), $request->getArticle(), $fingerprint, $userId);

        return new JsonResponse(['result' => !empty($result)]);
    }

    public function deleteCartProduct(CartService $service, DeleteCartItemRequest $request): JsonResponse
    {
        $fingerprint = Session::get('fingerprint');
        $userId = Session::get('user_id');

        $result = $service->deleteCartProduct($request->getArticle(), $fingerprint, $userId);

        return new JsonResponse(['result' => $result]);
    }

    public function applyCoupon(CartService $service, PromoCodeRequest $request): JsonResponse
    {
        $userId = Session::get('user_id');
        $fingerprint = Session::get('fingerprint');

        $cart = !empty($userId) ?
            $service->getUserCart($userId) :
            $service->getSessionCart($fingerprint);

        $result = $service->applyPromoCodeToCart($request->getPromoCode(), $cart);

        return new JsonResponse(['message' => $result]);
    }
}
