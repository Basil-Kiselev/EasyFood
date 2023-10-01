<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->getId(),
            'article' => $this->getArticle(),
            'name' => $this->getName(),
            'img' => $this->getImg(),
            'price' => $this->getPrice(),
            'quantity' => $this->getQuantity(),
            'totalPrice' => $this->getTotalPrice(),
        ];
    }
}
