<?php

namespace App\Http\Resources;

use App\Services\DTO\SettingDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property SettingDTO $resource
 */
class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->resource->getCode(),
            'value' => $this->resource->getValue(),
        ];
    }
}
