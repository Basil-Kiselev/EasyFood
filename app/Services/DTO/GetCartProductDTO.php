<?php

namespace App\Services\DTO;

class GetCartProductDTO
{
    public function __construct
    (
        private int $id,
        private string $article,
        private string $name,
        private string $img,
        private int $price,
        private int $quantity,
        private int $totalPrice,
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
     * @return GetCartProductDTO
     */
    public function setId(int $id): GetCartProductDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param string $article
     * @return GetCartProductDTO
     */
    public function setArticle(string $article): GetCartProductDTO
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
     * @return GetCartProductDTO
     */
    public function setName(string $name): GetCartProductDTO
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
     * @return GetCartProductDTO
     */
    public function setImg(string $img): GetCartProductDTO
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
     * @return GetCartProductDTO
     */
    public function setPrice(int $price): GetCartProductDTO
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
     * @return GetCartProductDTO
     */
    public function setQuantity(int $quantity): GetCartProductDTO
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
     * @return GetCartProductDTO
     */
    public function setTotalPrice(int $totalPrice): GetCartProductDTO
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
}
