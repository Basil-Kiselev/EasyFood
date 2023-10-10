<?php

namespace App\Http\Resources;

use App\Services\DTO\GetProductDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property GetProductDTO $resource
 */
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
            'id' => $this->resource->getId(),
            'article' => $this->resource->getArticle(),
            'name' => $this->resource->getName(),
            'description' => $this->resource->getDescription(),
            'img' => $this->resource->getImg(),
            'price' => $this->resource->getPrice(),
            'measureName' => $this->resource->getMeasureName(),
            'measureValue' => $this->resource->getMeasureValue(),
            'measureType' => $this->resource->getMeasureType(),
            'kcal' => $this->resource->getKcal(),
            'protein' => $this->resource->getProtein(),
            'fat' => $this->resource->getFat(),
            'carbohydrate' => $this->resource->getCarbohydrate(),
            'vegan' => $this->resource->getVegan(),
            'measureByHundred' => $this->resource->getMeasureByHundred(),
        ];
    }
}
