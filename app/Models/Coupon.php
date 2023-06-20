<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $type
 * @property string $value
 * @property string $promo_code
 * @property string $name
 */
class Coupon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Coupon
     */
    public function setType(string $type): Coupon
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Coupon
     */
    public function setValue(string $value): Coupon
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPromoCode(): string
    {
        return $this->promo_code;
    }

    /**
     * @param string $promo_code
     * @return Coupon
     */
    public function setPromoCode(string $promo_code): Coupon
    {
        $this->promo_code = $promo_code;
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
     * @return Coupon
     */
    public function setName(string $name): Coupon
    {
        $this->name = $name;
        return $this;
    }
}
