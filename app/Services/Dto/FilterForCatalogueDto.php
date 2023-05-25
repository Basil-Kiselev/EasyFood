<?php

namespace App\Services\Dto;

class FilterForCatalogueDto
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
     * @return FilterForCatalogueDto
     */
    public function setCategory(string $category): FilterForCatalogueDto
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
     * @return FilterForCatalogueDto
     */
    public function setMinPrice(int $minPrice): FilterForCatalogueDto
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
     * @return FilterForCatalogueDto
     */
    public function setMaxPrice(int $maxPrice): FilterForCatalogueDto
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
     * @return FilterForCatalogueDto
     */
    public function setIsVegan(int $isVegan): FilterForCatalogueDto
    {
        $this->isVegan = $isVegan;
        return $this;
    }


}
