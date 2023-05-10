<?php

namespace App\Services\Dto;

class CatalogueDto
{
    public function __construct
    (
        private string|null $category,
        private int|null $minPrice,
        private int|null $maxPrice,
        private int|null $isVegan,
    ){}

    /**
     * @return string
     */
    public function getCategory(): string|null
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return CatalogueDto
     */
    public function setCategory(string $category): CatalogueDto
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int|null
    {
        return $this->minPrice;
    }

    /**
     * @param int $minPrice
     * @return CatalogueDto
     */
    public function setMinPrice(int $minPrice): CatalogueDto
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int|null
    {
        return $this->maxPrice;
    }

    /**
     * @param int $maxPrice
     * @return CatalogueDto
     */
    public function setMaxPrice(int $maxPrice): CatalogueDto
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsVegan(): int|null
    {
        return $this->isVegan;
    }

    /**
     * @param int $isVegan
     * @return CatalogueDto
     */
    public function setIsVegan(int $isVegan): CatalogueDto
    {
        $this->isVegan = $isVegan;
        return $this;
    }


}
