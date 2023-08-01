<?php

namespace App\Services\DTO;

class GetCartHeaderInfoDTO
{
    public function __construct
    (
        private int $countProducts,
        private int $finalPrice,
    ){}

    /**
     * @return int
     */
    public function getCountProducts(): int
    {
        return $this->countProducts;
    }

    /**
     * @param int $countProducts
     * @return GetCartHeaderInfoDTO
     */
    public function setCountProducts(int $countProducts): GetCartHeaderInfoDTO
    {
        $this->countProducts = $countProducts;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinalPrice(): int
    {
        return $this->finalPrice;
    }

    /**
     * @param int $finalPrice
     * @return GetCartHeaderInfoDTO
     */
    public function setFinalPrice(int $finalPrice): GetCartHeaderInfoDTO
    {
        $this->finalPrice = $finalPrice;
        return $this;
    }
}
