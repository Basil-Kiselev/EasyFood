<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Services\Dto\CartDto;
use App\Services\Dto\CartProductDto;
use App\Services\Dto\CartHeaderInfoDto;

class CartService
{
    public function addToUserCart(string $article, int $userId): bool
    {
        /**
         * @var Product $product
         * @var Cart $cart
         */
        $product = Product::query()->where('article', $article)->firstOrFail();
        $cart = Cart::query()->firstOrCreate(['user_id' => $userId]);

        return $cart->addProduct($product);
    }

    public function addToSessionCart(string $article, string $sessionId): bool
    {
        /**
         * @var Product $product
         * @var Cart $cart
         */
        $product = Product::query()->where('article', $article)->firstOrFail();
        $cart = Cart::query()->firstOrCreate(['session_id' => $sessionId]);

        return $cart->addProduct($product);
    }

    public function getUserCart(int $userId): CartDto
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('user_id', $userId)->firstOrFail();

        return $this->composeCartDto($cart);
    }

    public function getSessionCart(string $sessionId): CartDto
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('session_id', $sessionId)->first();

        return $this->composeCartDto($cart);
    }

    public function composeCartDto(Cart|null $cart = null): CartDto
    {
        if (!$cart) {
            return new CartDto(0, 0, [], 0);
        }

        $cartProducts = $cart->cartProducts()->with('product')->get();
        $dtoList = [];

        /** @var CartProduct $cartProduct */
        foreach ($cartProducts as $cartProduct) {
            $totalPrice = $cartProduct->getProductQuantity() * $cartProduct->product->getPrice();
            $dtoList[] = new CartProductDto(
                article: $cartProduct->product->getArticle(),
                name: $cartProduct->product->getName(),
                img: $cartProduct->product->getImg(),
                price: $cartProduct->product->getPrice(),
                quantity: $cartProduct->getProductQuantity(),
                totalPrice: $totalPrice,
            );
        }
        return new CartDto(
            $cart->getPrice(),
            $cart->getFinalPrice(),
            $dtoList,
            $cart->coupon?->getValue(),
        );
    }

    public function deleteUserCartProduct(int $userId, string $article): bool
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('user_id', $userId)->firstOrFail();

        return $cart->deleteProduct($article);
    }

    public function deleteSessionCartProduct(string $sessionId, string $article): bool
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('session_id', $sessionId)->firstOrFail();

        return $cart->deleteProduct($article);
    }

    public function getSessionCartHeaderInfo(string $sessionId): CartHeaderInfoDto
    {
        $cart = Cart::query()->where('session_id', $sessionId)->first();

        return $this->composeCartHeaderInfoDto($cart);
    }

    public function getUserCartHeaderInfo(int $userId): CartHeaderInfoDto
    {
        $cart = Cart::query()->where('user_id', $userId)->first();

        return $this->composeCartHeaderInfoDto($cart);
    }

    public function composeCartHeaderInfoDto(Cart|null $cart = null): CartHeaderInfoDto
    {
        if (!$cart) {
            return new CartHeaderInfoDto(0,0);
        }

        return new CartHeaderInfoDto(
            $cart->cartProducts()->sum('product_quantity'),
            $cart->getFinalPrice(),
        );
    }

    public function applyPromoCodeToUserCart(string $promoCode, int $userId): bool
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('user_id', $userId)->first();

        return $cart->applyCoupon($promoCode);
    }

    public function applyPromoCodeToSessionCart(string $promoCode, string $sessionId): bool
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('session_id', $sessionId)->first();

        return $cart->applyCoupon($promoCode);
    }
}
