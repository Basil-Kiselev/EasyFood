<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Category $resource
 */
class RecommendedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category_id' => $this->resource->getId(),
            'category_name' => $this->resource->getName(),
            'category_code' => $this->resource->getCode(),
            'products' => ProductShortResource::collection($this->resource->products),
        ];
    }
}
