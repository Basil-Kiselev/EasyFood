<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'header' => $this->getHeader(),
            'text' => $this->getText(),
            'img' => $this->getImg(),
            'date' => $this->getDateCreated(),
            'alias' => $this->getAlias(),
            'category' => $this->getArticleCategory(),
        ];
    }
}
