<?php

namespace App\Models;

use App\Services\DTO\GetOrderDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $phone
 * @property int|null $coupon_id
 * @property int $price
 * @property int $final_price
 * @property string $status
 * @property string|null $order_notes
 */
class Order extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orderDeliveryDetail(): HasOne
    {
        return $this->hasOne(OrderDeliveryDetail::class);
    }

    public static function createOrder(Cart $cart, GetOrderDTO $DTO): Order
    {
        /** @var Cart $cart */
        $order = new Order();
        $order
            ->setUserId($cart->getUserId())
            ->setName($DTO->getName())
            ->setPhone($DTO->getPhone())
            ->setCouponId($cart->getCouponId())
            ->setPrice($cart->getPrice())
            ->setFinalPrice($cart->getFinalPrice())
            ->setOrderNotes($DTO->getOrderNotes())
            ->save();

        $order->orderDeliveryDetail()->create([
            'street' => $DTO->getDeliveryDetailDTO()->getStreet(),
            'building' => $DTO->getDeliveryDetailDTO()->getBuilding(),
            'apartment' => $DTO->getDeliveryDetailDTO()->getApartment(),
        ]);

        $cartProducts = $cart->cartProducts()->with('product')->get();
        /** @var CartProduct $cartProduct */
        foreach ($cartProducts as $cartProduct) {
            $order->orderProducts()->create([
                'product_id' => $cartProduct->getProductId(),
                'product_quantity' => $cartProduct->getProductQuantity(),
                'product_price' => $cartProduct->product->getPrice(),
            ]);
        }

        return $order;
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
     * @return Order
     */
    public function setUserId(?int $user_id): Order
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Order
     */
    public function setName(string $name): Order
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Order
     */
    public function setPhone(string $phone): Order
    {
        $this->phone = $phone;
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
     * @return Order
     */
    public function setCouponId(?int $coupon_id): Order
    {
        $this->coupon_id = $coupon_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Order
     */
    public function setPrice(int $price): Order
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinalPrice(): int
    {
        return $this->final_price;
    }

    /**
     * @param int $final_price
     * @return Order
     */
    public function setFinalPrice(int $final_price): Order
    {
        $this->final_price = $final_price;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Order
     */
    public function setStatus(string $status): Order
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderNotes(): ?string
    {
        return $this->order_notes;
    }

    /**
     * @param string|null $order_notes
     * @return Order
     */
    public function setOrderNotes(?string $order_notes): Order
    {
        $this->order_notes = $order_notes;
        return $this;
    }
}
