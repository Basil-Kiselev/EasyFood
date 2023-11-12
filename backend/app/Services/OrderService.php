<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DTO\GetOrderDTO;

class OrderService
{
    public function createOrder(GetOrderDTO $orderInfo, string $fingerprint, ?int $userId = null): int
    {
        $cartService = new CartService();
        $cart = $userId ? $cartService->getUserCart($userId) : $cartService->getSessionCart($fingerprint);
        $order = Order::createOrder($cart, $orderInfo);
        $cart->deleteWithRelationship();

        return $order->getId();
    }
}
