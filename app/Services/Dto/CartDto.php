<?php

namespace App\Services\Dto;

class CartDto
{
    public function __construct
    (
        private int $price,
        private int $finalPrice,
        private array $products,
        private int|null $discount = null,
    ){}

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return CartDto
     */
    public function setPrice(int $price): CartDto
    {
        $this->price = $price;
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
     * @return CartDto
     */
    public function setFinalPrice(int $finalPrice): CartDto
    {
        $this->finalPrice = $finalPrice;
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     * @return CartDto
     */
    public function setProducts(array $products): CartDto
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     * @return CartDto
     */
    public function setDiscount(?int $discount): CartDto
    {
        $this->discount = $discount;
        return $this;
    }
}
