<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->getId(),
            'price' => $this->getPrice(),
            'finalPrice' => $this->getFinalPrice(),
            'discount' => $this->getDiscount(),
            'productsCount' => $this->getProductsCount(),
            'products' => CartProductResource::collection($this->getProducts()),
        ];
    }
}
