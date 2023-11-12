<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property string $street
 * @property string $building
 * @property string|null $apartment
 * @property BelongsTo|Order $order
 */
class OrderDeliveryDetail extends Model
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
     * @return OrderDeliveryDetail
     */
    public function setOrderId(int $order_id): OrderDeliveryDetail
    {
        $this->order_id = $order_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return OrderDeliveryDetail
     */
    public function setStreet(string $street): OrderDeliveryDetail
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * @param string $building
     * @return OrderDeliveryDetail
     */
    public function setBuilding(string $building): OrderDeliveryDetail
    {
        $this->building = $building;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    /**
     * @param string|null $apartment
     * @return OrderDeliveryDetail
     */
    public function setApartment(?string $apartment): OrderDeliveryDetail
    {
        $this->apartment = $apartment;
        return $this;
    }
}
