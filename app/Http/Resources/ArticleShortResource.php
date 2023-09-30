<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->id,
            'header' => $this->header,
            'textPreview' => mb_substr($this->text, 0, 100),
            'img' => $this->img,
            'date' => $this->created_at,
            'alias' => $this->alias,
        ];
    }
}
