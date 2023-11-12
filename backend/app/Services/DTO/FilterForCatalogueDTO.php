<?php

namespace App\Services\DTO;

class FilterForCatalogueDTO
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
     * @return FilterForCatalogueDTO
     */
    public function setCategory(string $category): FilterForCatalogueDTO
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
     * @return FilterForCatalogueDTO
     */
    public function setMinPrice(int $minPrice): FilterForCatalogueDTO
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
     * @return FilterForCatalogueDTO
     */
    public function setMaxPrice(int $maxPrice): FilterForCatalogueDTO
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
     * @return FilterForCatalogueDTO
     */
    public function setIsVegan(int $isVegan): FilterForCatalogueDTO
    {
        $this->isVegan = $isVegan;
        return $this;
    }


}
