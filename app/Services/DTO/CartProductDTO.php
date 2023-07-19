<?php

namespace App\Services\DTO;

class CartProductDTO
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
     * @return CartProductDTO
     */
    public function setArticle(string $article): CartProductDTO
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
     * @return CartProductDTO
     */
    public function setName(string $name): CartProductDTO
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
     * @return CartProductDTO
     */
    public function setImg(string $img): CartProductDTO
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
     * @return CartProductDTO
     */
    public function setPrice(int $price): CartProductDTO
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
     * @return CartProductDTO
     */
    public function setQuantity(int $quantity): CartProductDTO
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
     * @return CartProductDTO
     */
    public function setTotalPrice(int $totalPrice): CartProductDTO
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
}
