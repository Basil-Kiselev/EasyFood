<?php

namespace App\Services\DTO;

class GetCartDTO
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
     * @return GetCartDTO
     */
    public function setId(int $id): GetCartDTO
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
     * @return GetCartDTO
     */
    public function setPrice(int|null $price): GetCartDTO
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
     * @return GetCartDTO
     */
    public function setFinalPrice(int|null $finalPrice): GetCartDTO
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
     * @return GetCartDTO
     */
    public function setProducts(array $products): GetCartDTO
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
     * @return GetCartDTO
     */
    public function setDiscount(?int $discount): GetCartDTO
    {
        $this->discount = $discount;
        return $this;
    }
}
