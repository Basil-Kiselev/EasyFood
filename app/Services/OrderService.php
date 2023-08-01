<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DTO\GetOrderDTO;

class OrderService
{
    public function createOrder(GetOrderDTO $DTO, int $cartId): Order
    {
        $cartService = new CartService();
        $cart = $cartService->getCart($cartId);
        $order = Order::createOrder($cart, $DTO);
        $cart->deleteWithRelationship();

        return $order;
    }
}
