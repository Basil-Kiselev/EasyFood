<?php

namespace App\Services\Dto;

class CategoryDto
{
    private array $products = [];

    public function __construct
    (
        private string $code,
        private string $name,
    ){}

    public function addProduct(ProductDto $dto)
    {
        $this->products[] = $dto;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $productDto
     * @return CategoryDto
     */
    public function setProductDto(array $productDto): CategoryDto
    {
        $this->productDto = $productDto;
        return $this;
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
     * @return CategoryDto
     */
    public function setCode(string $code): CategoryDto
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
     * @return CategoryDto
     */
    public function setName(string $name): CategoryDto
    {
        $this->name = $name;
        return $this;
    }
}
