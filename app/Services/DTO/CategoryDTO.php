<?php

namespace App\Services\DTO;

class CategoryDTO
{
    private array $products = [];

    public function __construct
    (
        private string $code,
        private string $name,
    ){}

    public function addProduct(RecommendedProductDTO $dto)
    {
        $this->products[] = $dto;
    }

    /**
     * @return RecommendedProductDTO[]
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
     * @return CategoryDTO
     */
    public function setCode(string $code): CategoryDTO
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
     * @return CategoryDTO
     */
    public function setName(string $name): CategoryDTO
    {
        $this->name = $name;
        return $this;
    }
}
