<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DefaultResultResource extends JsonResource
{
    public function __construct
    (
        private bool $result,
        private mixed $data,
    ){}

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'result' => $this->result,
            'data' => $this->data,
        ];
    }
}
