<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'article' => $this->getArticle(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'img' => $this->getImg(),
            'price' => $this->getPrice(),
            'measureName' => $this->getMeasureName(),
            'measureValue' => $this->getMeasureValue(),
            'measureType' => $this->getMeasureType(),
            'kcal' => $this->getKcal(),
            'protein' => $this->getProtein(),
            'fat' => $this->getFat(),
            'carbohydrate' => $this->getCarbohydrate(),
            'vegan' => $this->getVegan(),
            'measureByHundred' => $this->getMeasureByHundred(),
        ];
    }
}
