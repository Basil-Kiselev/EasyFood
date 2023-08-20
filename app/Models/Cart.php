<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string|null $session_id
 * @property int|null $coupon_id
 * @property int|null $price
 * @property int|null $final_price
 * @property BelongsTo|Coupon $coupon
 * @property BelongsTo|CartProduct $cartProducts
 */
class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function addProduct(Product $product): bool
    {
        $query = $this->cartProducts()->where('product_id', $product->getId());

        if ($query->exists()) {
            $query->increment('product_quantity');
        } else {
            $this->cartProducts()->create([
                'product_id' => $product->getId(),
                'product_quantity' => 1,
            ]);
        }
        $this->recalculate();

        return true;
    }

    public function deleteWithRelationship(): void
    {
        $this->cartProducts()->delete();
        $this->delete();
    }

    public function updateProductQuantity(int $newQuantity, int $productId): void
    {
        $this->cartProducts()->where('product_id', $productId)->update(['product_quantity' => $newQuantity]);
        $this->recalculate();
    }

    public function recalculate(): void
    {
        $price = 0;
        $cartProducts = $this->cartProducts()->with('product')->get();

        /** @var CartProduct $cartProduct */
        foreach ($cartProducts as $cartProduct) {
            $cartProductQuantity = $cartProduct->getProductQuantity();
            $cartProductPrice = $cartProduct->product->getPrice();
            $price = $price + ($cartProductPrice * $cartProductQuantity);
        }

        $this->setPrice($price);
        $this->recalculateFinalPrice();
    }

    public function applyCoupon(Coupon $coupon): string
    {
        $couponValue = $coupon->getValue();
        $discountCoefficient = (100 - $couponValue) / 100;
        $this->setCouponId($coupon->getId());
        $this->recalculateFinalPrice($discountCoefficient);

        return 'Купон успешно применен';
    }

    public function recalculateFinalPrice(float $discountCoefficient = 1): void
    {
        $coupon = $this->coupon;

        if (!empty($coupon)) {
            $couponValue = $coupon->getValue();
            $discountCoefficient = (100 - $couponValue) / 100;
        }

        $price = $this->getPrice();
        $finalPrice = $price * $discountCoefficient;
        $this->setFinalPrice($finalPrice)->save();
    }

    public function deleteProduct(string $article): string
    {
        $productId = Product::query()->where('article', $article)->value('id');
        $this->cartProducts()->where('product_id', $productId)->delete();

        if (!empty($this->cartProducts()->first())) {
            $this->recalculate();

            return 'Товар убран';
        } else {
            $this->delete();

            return 'Корзина пуста';
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     * @return Cart
     */
    public function setUserId(?int $user_id): Cart
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->session_id;
    }

    /**
     * @param string|null $session_id
     * @return Cart
     */
    public function setSessionId(?string $session_id): Cart
    {
        $this->session_id = $session_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCouponId(): ?int
    {
        return $this->coupon_id;
    }

    /**
     * @param int|null $coupon_id
     * @return Cart
     */
    public function setCouponId(?int $coupon_id): Cart
    {
        $this->coupon_id = $coupon_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     * @return Cart
     */
    public function setPrice(?int $price): Cart
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFinalPrice(): ?int
    {
        return $this->final_price;
    }

    /**
     * @param int|null $final_price
     * @return Cart
     */
    public function setFinalPrice(?int $final_price): Cart
    {
        $this->final_price = $final_price;
        return $this;
    }

    /**
     * @return Coupon|BelongsTo
     */
    public function getCoupon(): BelongsTo|Coupon
    {
        return $this->coupon;
    }

    /**
     * @param Coupon|BelongsTo $coupon
     * @return Cart
     */
    public function setCoupon(BelongsTo|Coupon $coupon): Cart
    {
        $this->coupon = $coupon;
        return $this;
    }
}
