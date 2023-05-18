<?php

namespace App\Services\Dto;

class ProductDto
{
    public function __construct
    (
        private string $article,
        private string $name,
        private string $description,
        private string $img,
        private int $price,
        private string|null $measureName,
        private float|null $measureValue,
        private string|null $measureType,
        private int $kcal,
        private float $protein,
        private float $fat,
        private float $carbohydrate,
        private string $vegan,
        private string $measureByHundred,
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
     * @return ProductDto
     */
    public function setArticle(string $article): ProductDto
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
     * @return ProductDto
     */
    public function setName(string $name): ProductDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ProductDto
     */
    public function setDescription(string $description): ProductDto
    {
        $this->description = $description;
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
     * @return ProductDto
     */
    public function setImg(string $img): ProductDto
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
     * @return ProductDto
     */
    public function setPrice(int $price): ProductDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeasureName(): ?string
    {
        return $this->measureName;
    }

    /**
     * @param string|null $measureName
     * @return ProductDto
     */
    public function setMeasureName(?string $measureName): ProductDto
    {
        $this->measureName = $measureName;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getMeasureValue(): ?float
    {
        return $this->measureValue;
    }

    /**
     * @param float|null $measureValue
     * @return ProductDto
     */
    public function setMeasureValue(?float $measureValue): ProductDto
    {
        $this->measureValue = $measureValue;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeasureType(): ?string
    {
        return $this->measureType;
    }

    /**
     * @param string|null $measureType
     * @return ProductDto
     */
    public function setMeasureType(?string $measureType): ProductDto
    {
        $this->measureType = $measureType;
        return $this;
    }

    /**
     * @return int
     */
    public function getKcal(): int
    {
        return $this->kcal;
    }

    /**
     * @param int $kcal
     * @return ProductDto
     */
    public function setKcal(int $kcal): ProductDto
    {
        $this->kcal = $kcal;
        return $this;
    }

    /**
     * @return float
     */
    public function getProtein(): float
    {
        return $this->protein;
    }

    /**
     * @param float $protein
     * @return ProductDto
     */
    public function setProtein(float $protein): ProductDto
    {
        $this->protein = $protein;
        return $this;
    }

    /**
     * @return float
     */
    public function getFat(): float
    {
        return $this->fat;
    }

    /**
     * @param float $fat
     * @return ProductDto
     */
    public function setFat(float $fat): ProductDto
    {
        $this->fat = $fat;
        return $this;
    }

    /**
     * @return float
     */
    public function getCarbohydrate(): float
    {
        return $this->carbohydrate;
    }

    /**
     * @param float $carbohydrate
     * @return ProductDto
     */
    public function setCarbohydrate(float $carbohydrate): ProductDto
    {
        $this->carbohydrate = $carbohydrate;
        return $this;
    }

    /**
     * @return string
     */
    public function getVegan(): string
    {
        return $this->vegan;
    }

    /**
     * @param string $vegan
     * @return ProductDto
     */
    public function setVegan(string $vegan): ProductDto
    {
        $this->vegan = $vegan;
        return $this;
    }

    /**
     * @return string
     */
    public function getMeasureByHundred(): string
    {
        return $this->measureByHundred;
    }

    /**
     * @param string $measureByHundred
     * @return ProductDto
     */
    public function setMeasureByHundred(string $measureByHundred): ProductDto
    {
        $this->measureByHundred = $measureByHundred;
        return $this;
    }




}
