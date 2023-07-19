<?php

namespace App\Services\DTO;

class RelatedProductDTO
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
     * @return RelatedProductDTO
     */
    public function setArticle(string $article): RelatedProductDTO
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
     * @return RelatedProductDTO
     */
    public function setName(string $name): RelatedProductDTO
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
     * @return RelatedProductDTO
     */
    public function setImg(string $img): RelatedProductDTO
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
     * @return RelatedProductDTO
     */
    public function setPrice(int $price): RelatedProductDTO
    {
        $this->price = $price;
        return $this;
    }
}
