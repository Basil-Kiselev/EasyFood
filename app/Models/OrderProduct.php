<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_quantity
 * @property int $product_price
 */
class OrderProduct extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     * @return OrderProduct
     */
    public function setOrderId(int $order_id): OrderProduct
    {
        $this->order_id = $order_id;
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
     * @return OrderProduct
     */
    public function setProductId(int $product_id): OrderProduct
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
     * @return OrderProduct
     */
    public function setProductQuantity(int $product_quantity): OrderProduct
    {
        $this->product_quantity = $product_quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductPrice(): int
    {
        return $this->product_price;
    }

    /**
     * @param int $product_price
     * @return OrderProduct
     */
    public function setProductPrice(int $product_price): OrderProduct
    {
        $this->product_price = $product_price;
        return $this;
    }
}
