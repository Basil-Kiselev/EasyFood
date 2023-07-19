<?php

namespace App\Services;

use App\Models\Order;
use App\Services\DTO\OrderDTO;

class OrderService
{
    public function createOrder(OrderDTO $DTO, int $cartId): Order
    {
        $cartService = new CartService();
        $cart = $cartService->getCart($cartId);
        $order = Order::createOrder($cart, $DTO);
        $cart->deleteWithRelationship();

        return $order;
    }
}
