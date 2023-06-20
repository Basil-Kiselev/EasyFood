<?php

namespace App\Services\Dto;

class CartProductDto
{
    public function __construct
    (
        private string $article,
        private string $name,
        private string $img,
        private int $price,
        private int $quantity,
        private int $totalPrice,
    ){}

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param string $article
     * @return CartProductDto
     */
    public function setArticle(string $article): CartProductDto
    {
        $this->article = $article;
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
     * @return CartProductDto
     */
    public function setName(string $name): CartProductDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     * @return CartProductDto
     */
    public function setImg(string $img): CartProductDto
    {
        $this->img = $img;
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
     * @return CartProductDto
     */
    public function setPrice(int $price): CartProductDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return CartProductDto
     */
    public function setQuantity(int $quantity): CartProductDto
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }

    /**
     * @param int $totalPrice
     * @return CartProductDto
     */
    public function setTotalPrice(int $totalPrice): CartProductDto
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
}
