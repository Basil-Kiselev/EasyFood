<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $code
 * @property string $value
 * @property string $name
*/
class Setting extends Model
{
    use HasFactory;

    public const CODE_PHONE = 'phone';
    public const CODE_ADDRESS = 'address';
    public const CODE_EMAIL = 'email';
    public const CODE_FREE_DELIVERY = 'free_delivery_value';
    public const CODE_WORKDAY_START = 'workday_start';
    public const CODE_WORKDAY_END = 'workday_end';

    protected $guarded = ['id'];

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
     * @return Setting
     */
    public function setType(string $type): Setting
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Setting
     */
    public function setCode(string $code): Setting
    {
        $this->code = $code;
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
     * @return Setting
     */
    public function setValue(string $value): Setting
    {
        $this->value = $value;
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
     * @return Setting
     */
    public function setName(string $name): Setting
    {
        $this->name = $name;
        return $this;
    }
}
