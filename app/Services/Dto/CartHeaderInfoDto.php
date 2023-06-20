<?php

namespace App\Services\Dto;

class CartHeaderInfoDto
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
     * @return CartHeaderInfoDto
     */
    public function setCountProducts(int $countProducts): CartHeaderInfoDto
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
     * @return CartHeaderInfoDto
     */
    public function setFinalPrice(int $finalPrice): CartHeaderInfoDto
    {
        $this->finalPrice = $finalPrice;
        return $this;
    }
}
