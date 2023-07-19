<?php

namespace App\Services\DTO;

class RecommendedProductDTO
{
    public function __construct
    (
        private string $article,
        private string $name,
        private string $img,
        private int $price,
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
     * @return RecommendedProductDTO
     */
    public function setArticle(string $article): RecommendedProductDTO
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
     * @return RecommendedProductDTO
     */
    public function setName(string $name): RecommendedProductDTO
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
     * @return RecommendedProductDTO
     */
    public function setImg(string $img): RecommendedProductDTO
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
     * @return RecommendedProductDTO
     */
    public function setPrice(int $price): RecommendedProductDTO
    {
        $this->price = $price;
        return $this;
    }
}
