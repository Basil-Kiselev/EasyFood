<?php

namespace App\Services\DTO;

class GetRecommendedProductDTO
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
     * @return GetRecommendedProductDTO
     */
    public function setArticle(string $article): GetRecommendedProductDTO
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
     * @return GetRecommendedProductDTO
     */
    public function setName(string $name): GetRecommendedProductDTO
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
     * @return GetRecommendedProductDTO
     */
    public function setImg(string $img): GetRecommendedProductDTO
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
     * @return GetRecommendedProductDTO
     */
    public function setPrice(int $price): GetRecommendedProductDTO
    {
        $this->price = $price;
        return $this;
    }
}
