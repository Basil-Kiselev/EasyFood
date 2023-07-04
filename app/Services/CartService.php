<?php

namespace App\Services;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
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

    public function changeQuantityCartProducts(int $cartId, string $type, string $article): string
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('id', $cartId)->first();
        $productId = Product::query()->where('article', $article)->value('id');
        $query = $cart->cartProducts()->where('product_id', $productId);
        $currentQuantity = $query->value('product_quantity');
        $newQuantity = match ($type) {
            'inc' => $currentQuantity + 1,
            'dec' => $currentQuantity - 1,
        };

        if ($newQuantity > 0) {
            $cart->updateProductQuantity($newQuantity, $productId);

            return 'Кол-во изменено';
        } else {
            return $cart->deleteProduct($article);
        }
    }

    public function getUserCart(int $userId): CartDto
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('user_id', $userId)->first();

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
            return new CartDto(0,0, 0, [], 0);
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
            $cart->getId(),
            $cart->getPrice(),
            $cart->getFinalPrice(),
            $dtoList,
            $cart->coupon?->getValue(),
        );
    }

    public function deleteCartProduct(int $cartId, string $article): string
    {
        /** @var Cart $cart */
        $cart = Cart::query()->where('id', $cartId)->first();

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

    public function applyPromoCodeToCart(string $promoCode, int $cartId): string
    {
        /**
         * @var Coupon $coupon
         * @var Cart $cart
         */
        $cart = Cart::query()->where('id', $cartId)->first();
        $coupon = Coupon::query()->where('promo_code', $promoCode)->first();

        if (empty($coupon)) {
            return 'Купон не действителен';
        } else {
            return $cart->applyCoupon($coupon);
        }
    }
}
