<?php

namespace App\Services\DTO;

class ProductDTO
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
     * @return ProductDTO
     */
    public function setArticle(string $article): ProductDTO
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
     * @return ProductDTO
     */
    public function setName(string $name): ProductDTO
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
     * @return ProductDTO
     */
    public function setDescription(string $description): ProductDTO
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
     * @return ProductDTO
     */
    public function setImg(string $img): ProductDTO
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
     * @return ProductDTO
     */
    public function setPrice(int $price): ProductDTO
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
     * @return ProductDTO
     */
    public function setMeasureName(?string $measureName): ProductDTO
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
     * @return ProductDTO
     */
    public function setMeasureValue(?float $measureValue): ProductDTO
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
     * @return ProductDTO
     */
    public function setMeasureType(?string $measureType): ProductDTO
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
     * @return ProductDTO
     */
    public function setKcal(int $kcal): ProductDTO
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
     * @return ProductDTO
     */
    public function setProtein(float $protein): ProductDTO
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
     * @return ProductDTO
     */
    public function setFat(float $fat): ProductDTO
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
     * @return ProductDTO
     */
    public function setCarbohydrate(float $carbohydrate): ProductDTO
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
     * @return ProductDTO
     */
    public function setVegan(string $vegan): ProductDTO
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
     * @return ProductDTO
     */
    public function setMeasureByHundred(string $measureByHundred): ProductDTO
    {
        $this->measureByHundred = $measureByHundred;
        return $this;
    }




}
