<?php

namespace App\Http\Resources;

use App\Services\DTO\GetCartProductDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property GetCartProductDTO $resource
 */
class CartProductResource extends JsonResource
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
            'img' => $this->resource->getImg(),
            'price' => $this->resource->getPrice(),
            'quantity' => $this->resource->getQuantity(),
            'totalPrice' => $this->resource->getTotalPrice(),
        ];
    }
}
