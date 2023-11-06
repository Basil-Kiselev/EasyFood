<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $productId
 * @property int $relatedProductId
 */
class ProductRelation extends Model
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
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return ProductRelation
     */
    public function setProductId(int $productId): ProductRelation
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRelatedProductId(): int
    {
        return $this->relatedProductId;
    }

    /**
     * @param int $relatedProductId
     * @return ProductRelation
     */
    public function setRelatedProductId(int $relatedProductId): ProductRelation
    {
        $this->relatedProductId = $relatedProductId;
        return $this;
    }
}
