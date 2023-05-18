<?php

namespace App\Services\Dto;

class RecommendedProductDto
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
     * @return RecommendedProductDto
     */
    public function setArticle(string $article): RecommendedProductDto
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
     * @return RecommendedProductDto
     */
    public function setName(string $name): RecommendedProductDto
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
     * @return RecommendedProductDto
     */
    public function setImg(string $img): RecommendedProductDto
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
     * @return RecommendedProductDto
     */
    public function setPrice(int $price): RecommendedProductDto
    {
        $this->price = $price;
        return $this;
    }
}
