<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Http\Requests\OrderRequest;
use App\Services\AuthService;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(CartService $service): View|RedirectResponse
    {
        $cart = Auth::check() ? $service->getUserCart(Auth::id()) : $service->getSessionCart(AuthHelper::fingerprint());

        if ($cart->getId() == 0) {
            return redirect('cart');
        } else {
            return view('checkout')->with('cart', $service->composeCartDto($cart));
        }
    }

    public function createOrder(OrderRequest $request, OrderService $service, AuthService $authService): View
    {
        $fingerprint = AuthHelper::fingerprint();

        if (($request->isCreateAcc()) === true) {
            $authService->loginOrRegister($request->composeNewUserDTO(), $fingerprint);
        }

        $userId = Auth::id();
        $orderId = $service->createOrder($request->composeOrderDTO(), $fingerprint, $userId);

        return view('order')->with('orderId', $orderId);
    }
}
