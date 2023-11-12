<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Article $resource
 */
class ArticleShortResource extends JsonResource
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
            'textPreview' => mb_substr($this->resource->getText(), 0, 100),
            'img' => $this->resource->getImg(),
            'date' => $this->resource->getCreatedAt(),
            'alias' => $this->resource->getAlias(),
        ];
    }
}
