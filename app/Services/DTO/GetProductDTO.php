<?php

namespace App\Services\DTO;

class GetProductDTO
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
     * @return GetProductDTO
     */
    public function setArticle(string $article): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setName(string $name): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setDescription(string $description): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setImg(string $img): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setPrice(int $price): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setMeasureName(?string $measureName): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setMeasureValue(?float $measureValue): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setMeasureType(?string $measureType): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setKcal(int $kcal): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setProtein(float $protein): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setFat(float $fat): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setCarbohydrate(float $carbohydrate): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setVegan(string $vegan): GetProductDTO
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
     * @return GetProductDTO
     */
    public function setMeasureByHundred(string $measureByHundred): GetProductDTO
    {
        $this->measureByHundred = $measureByHundred;
        return $this;
    }




}
