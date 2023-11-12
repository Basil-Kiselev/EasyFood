<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Product $resource
 */
class ProductShortResource extends JsonResource
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
            'name' => $this->resource->getName(),
            'alias' => $this->resource->getArticle(),
            'img' => $this->resource->getImg(),
            'price' => $this->resource->getPrice(),
        ];
    }
}
