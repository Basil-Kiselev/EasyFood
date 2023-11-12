<?php

namespace App\Services\DTO;

class GetProductCategoryDTO
{
    private array $products = [];

    public function __construct
    (
        private string $code,
        private string $name,
    ){}

    public function addProduct(GetRecommendedProductDTO $productsData)
    {
        $this->products[] = $productsData;
    }

    /**
     * @return GetRecommendedProductDTO[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return GetProductCategoryDTO
     */
    public function setCode(string $code): GetProductCategoryDTO
    {
        $this->code = $code;
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
     * @return GetProductCategoryDTO
     */
    public function setName(string $name): GetProductCategoryDTO
    {
        $this->name = $name;
        return $this;
    }
}
