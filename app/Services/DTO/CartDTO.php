<?php

namespace App\Services\DTO;

class CartDTO
{
    public function __construct
    (
        private int $id,
        private int $price,
        private int $finalPrice,
        private array $products,
        private int|null $discount = null,
    ){}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CartDTO
     */
    public function setId(int $id): CartDTO
    {
        $this->id = $id;
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
     * @return CartDTO
     */
    public function setPrice(int|null $price): CartDTO
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
     * @return CartDTO
     */
    public function setFinalPrice(int|null $finalPrice): CartDTO
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
     * @return CartDTO
     */
    public function setProducts(array $products): CartDTO
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
     * @return CartDTO
     */
    public function setDiscount(?int $discount): CartDTO
    {
        $this->discount = $discount;
        return $this;
    }
}
