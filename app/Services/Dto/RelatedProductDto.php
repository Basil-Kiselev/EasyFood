<?php

namespace App\Services\Dto;

class RelatedProductDto
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
     * @return RelatedProductDto
     */
    public function setArticle(string $article): RelatedProductDto
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
     * @return RelatedProductDto
     */
    public function setName(string $name): RelatedProductDto
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
     * @return RelatedProductDto
     */
    public function setImg(string $img): RelatedProductDto
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
     * @return RelatedProductDto
     */
    public function setPrice(int $price): RelatedProductDto
    {
        $this->price = $price;
        return $this;
    }
}
