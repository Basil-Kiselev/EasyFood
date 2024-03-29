<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\DTO\GetCartDTO;
use App\Services\DTO\GetCartProductDTO;
use App\Services\DTO\GetCartHeaderInfoDTO;
use Illuminate\Database\Eloquent\Model;

class CartService
{
    public function addToUserCart(string $article, int $userId): Cart
    {
        /**
         * @var Product $product
         * @var Cart $cart
         */
        $product = Product::query()->where('article', $article)->firstOrFail();
        $cart = Cart::query()->firstOrCreate(['user_id' => $userId]);

        return $cart->addProduct($product);
    }

    public function addToSessionCart(string $article, string $fingerprint): Cart
    {
        /**
         * @var Product $product
         * @var Cart $cart
         */
        $product = Product::query()->where('article', $article)->firstOrFail();
        $cart = Cart::query()->firstOrCreate(['fingerprint' => $fingerprint]);

        return $cart->addProduct($product);
    }

    public function changeSessionToUser(string $fingerprint, int $userId): bool
    {
        $sessionCart = Cart::query()->where('fingerprint', $fingerprint)->first();
        $userCart = Cart::query()->where('user_id', $userId)->first();

        /**
         * @var Cart $sessionCart
         * @var Cart $userCart
         */
        if (!empty($sessionCart)) {

            if (empty($userCart)) {
                $sessionCart->setUserId($userId);
                $sessionCart->setFingerprint(null);
                $sessionCart->save();
            } else {
                $sessionCartProducts = $sessionCart->cartProducts()->get()->all();
                $userCartId = $userCart->getId();

                /** @var CartProduct $cartProduct */
                foreach ($sessionCartProducts as $cartProduct) {
                    $cartProduct->setCartId($userCartId);
                    $cartProduct->save();
                }
                $sessionCart->delete();
            }
        }

        return true;
    }

    public function changeQuantityCartProducts(string $type, string $article, string $fingerprint, ?int $userId = null): bool|null
    {
        $cart = !empty($userId) ?
            self::getUserCart($userId) :
            self::getSessionCart($fingerprint);

        $productId = Product::query()->where('article', $article)->value('id');
        $currentQuantity = $cart->cartProducts()->where('product_id', $productId)->value('product_quantity');
        $newQuantity = match ($type) {
            'inc' => $currentQuantity + 1,
            'dec' => $currentQuantity - 1,
        };

        if ($newQuantity > 0) {
            $cart->updateProductQuantity($newQuantity, $productId);

            return true;
        } else {
            return $cart->deleteProduct($article);
        }
    }

    public function getCart(int $cartId): Cart|Model
    {
        return Cart::query()->find($cartId);
    }

    public function getUserCart(int $userId): Cart|Model|null
    {
        return Cart::query()->where('user_id', $userId)->first();
    }

    public function getSessionCart(string $fingerprint): Cart|Model|null
    {
        return Cart::query()->where('fingerprint', $fingerprint)->first();
    }

    public function composeCartDto(Cart|null $cart = null): GetCartDTO
    {
        if (!$cart) {
            return new GetCartDTO(0,0, 0, 0, [], null);
        }

        $cartProducts = $cart->cartProducts()->with('product')->get();
        $productDtoList = [];

        /** @var CartProduct $cartProduct */
        foreach ($cartProducts as $cartProduct) {
            $totalPrice = $cartProduct->getProductQuantity() * $cartProduct->product->getPrice();
            $productDtoList[] = new GetCartProductDTO(
                id: $cartProduct->product->getId(),
                article: $cartProduct->product->getArticle(),
                name: $cartProduct->product->getName(),
                img: $cartProduct->product->getImg(),
                price: $cartProduct->product->getPrice(),
                quantity: $cartProduct->getProductQuantity(),
                totalPrice: $totalPrice,
            );
        }

        return new GetCartDTO(
            id: $cart->getId(),
            price: $cart->getPrice(),
            finalPrice: $cart->getFinalPrice(),
            productsCount: $cart->cartProducts()->sum('product_quantity'),
            products: $productDtoList,
            discount: $cart->coupon?->getValue(),
        );
    }

    public function deleteCartProduct(string $article, string $fingerprint, ?int $userId = null): bool|null
    {
        /** @var Cart $cart */
        $cart = !empty($userId) ?
            self::getUserCart($userId) :
            self::getSessionCart($fingerprint);

        return $cart->deleteProduct($article);
    }

    public function getSessionCartHeaderInfo(string $fingerprint): GetCartHeaderInfoDTO
    {
        $cart = Cart::query()->where('fingerprint', $fingerprint)->first();

        return $this->composeCartHeaderInfoDto($cart);
    }

    public function getUserCartHeaderInfo(int $userId): GetCartHeaderInfoDTO
    {
        $cart = Cart::query()->where('user_id', $userId)->first();

        return $this->composeCartHeaderInfoDto($cart);
    }

    public function composeCartHeaderInfoDto(Cart|null $cart = null): GetCartHeaderInfoDTO
    {
        if (!$cart) {
            return new GetCartHeaderInfoDTO(0,0);
        }

        return new GetCartHeaderInfoDTO(
            $cart->cartProducts()->sum('product_quantity'),
            $cart->getFinalPrice(),
        );
    }

    public function applyPromoCodeToCart(string $promoCode, Cart $cart): string
    {
        /**
         * @var Coupon $coupon
         */
        $coupon = Coupon::query()->where('promo_code', $promoCode)->first();

        if (empty($coupon)) {
            return 'Купон не действителен';
        } else {
            return $cart->applyCoupon($coupon);
        }
    }
}
