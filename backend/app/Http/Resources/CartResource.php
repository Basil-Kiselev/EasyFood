<?php

namespace App\Http\Resources;

use App\Services\DTO\GetCartDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property GetCartDTO $resource
 */
class CartResource extends JsonResource
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
            'price' => $this->resource->getPrice(),
            'finalPrice' => $this->resource->getFinalPrice(),
            'discount' => $this->resource->getDiscount(),
            'productsCount' => $this->resource->getProductsCount(),
            'products' => CartProductResource::collection($this->resource->getProducts()),
        ];
    }
}
