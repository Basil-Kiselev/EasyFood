<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\AuthService;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(CartService $service): View|RedirectResponse
    {
        $cart = Auth::check() ? $service->getUserCart(Auth::id()) : $service->getSessionCart(Session::getId());

        if ($cart->getId() == 0) {
            return redirect('cart');
        } else {
            return view('checkout')->with('cart', $cart);
        }
    }

    public function createOrder(OrderRequest $request, OrderService $service, AuthService $authService): JsonResponse
    {
        $message = 'Заказ оформлен. Наш менеджер вам перезвонит.';

        if (($request->isCreateAcc()) == 1) {
            $message = $message . '. ' . $authService->loginOrRegister($request->composeNewUserDTO());
        }

        $service->createOrder($request->composeOrderDTO(), $request->getCartId());

        return new JsonResponse(['message' => $message]);
    }
}
