<?php

namespace App\Services\DTO;

class CartHeaderInfoDTO
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
     * @return CartHeaderInfoDTO
     */
    public function setCountProducts(int $countProducts): CartHeaderInfoDTO
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
     * @return CartHeaderInfoDTO
     */
    public function setFinalPrice(int $finalPrice): CartHeaderInfoDTO
    {
        $this->finalPrice = $finalPrice;
        return $this;
    }
}
