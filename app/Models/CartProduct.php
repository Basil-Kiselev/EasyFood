<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $cart_id
 * @property int $product_id
 * @property int $product_quantity
 */
class CartProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cart_id;
    }

    /**
     * @param int $cart_id
     * @return CartProduct
     */
    public function setCartId(int $cart_id): CartProduct
    {
        $this->cart_id = $cart_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     * @return CartProduct
     */
    public function setProductId(int $product_id): CartProduct
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductQuantity(): int
    {
        return $this->product_quantity;
    }

    /**
     * @param int $product_quantity
     * @return CartProduct
     */
    public function setProductQuantity(int $product_quantity): CartProduct
    {
        $this->product_quantity = $product_quantity;
        return $this;
    }
}
