<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@property int $id
 *@property int $userId
 *@property int $productId
 */
class UserFavoriteProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return UserFavoriteProduct
     */
    public function setUserId(int $userId): UserFavoriteProduct
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return UserFavoriteProduct
     */
    public function setProductId(int $productId): UserFavoriteProduct
    {
        $this->productId = $productId;
        return $this;
    }
}
