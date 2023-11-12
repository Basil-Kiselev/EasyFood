<?php

namespace App\Http\Resources;

use App\Services\DTO\GetArticlesDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property GetArticlesDTO $resource
 */
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
            'id' => $this->resource->getId(),
            'header' => $this->resource->getHeader(),
            'text' => $this->resource->getText(),
            'img' => $this->resource->getImg(),
            'date' => $this->resource->getDateCreated(),
            'alias' => $this->resource->getAlias(),
            'category' => $this->resource->getArticleCategory(),
        ];
    }
}
