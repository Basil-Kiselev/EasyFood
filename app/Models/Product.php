<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $article
 * @property string $name
 * @property string $description
 * @property int $price
 * @property float $volume
 * @property float $weight
 * @property int $kcal
 * @property float $protein
 * @property float $fat
 * @property float $carbohydrate
 * @property bool $is_vegan
 * @property bool $is_recommend
 * @property string $img
 */
class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     * @return Product
     */
    public function setCategoryId(int $category_id): Product
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param string $article
     * @return Product
     */
    public function setArticle(string $article): Product
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
     * @return Product
     */
    public function setName(string $name): Product
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
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
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
     * @return Product
     */
    public function setPrice(int $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getVolume(): float|null
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     * @return Product
     */
    public function setVolume(float $volume): Product
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float|null
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return Product
     */
    public function setWeight(float $weight): Product
    {
        $this->weight = $weight;
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
     * @return Product
     */
    public function setKcal(int $kcal): Product
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
     * @return Product
     */
    public function setProtein(float $protein): Product
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
     * @return Product
     */
    public function setFat(float $fat): Product
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
     * @return Product
     */
    public function setCarbohydrate(float $carbohydrate): Product
    {
        $this->carbohydrate = $carbohydrate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVegan(): bool
    {
        return $this->is_vegan;
    }

    /**
     * @param bool $is_vegan
     * @return Product
     */
    public function setIsVegan(bool $is_vegan): Product
    {
        $this->is_vegan = $is_vegan;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsRecommend(): bool
    {
        return $this->is_recommend;
    }

    /**
     * @param bool $is_recommend
     * @return Product
     */
    public function setIsRecommend(bool $is_recommend): Product
    {
        $this->is_recommend = $is_recommend;
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
     * @return Product
     */
    public function setImg(string $img): Product
    {
        $this->img = $img;
        return $this;
    }

}
