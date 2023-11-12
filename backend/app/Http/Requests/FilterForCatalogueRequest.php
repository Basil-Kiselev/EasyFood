<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string $category
 * @property int $price_min
 * @property int $price_max
 * @property bool $is_vegan
 */
class FilterForCatalogueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'nullable|string',
            'price_min' => 'nullable|int',
            'price_max' => 'nullable|int|gte:price_min',
            'is_vegan' => 'nullable|bool',
        ];
    }

    public function messages(): array
    {
        return [
            'price_max.gte' => 'Неккоректный диапазон',
        ];
    }

    /**
     * @return string
     */
    public function getCategory(): string|null
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function getPriceMin(): int|null
    {
        return $this->price_min;
    }

    /**
     * @return int
     */
    public function getPriceMax(): int|null
    {
        return $this->price_max;
    }

    /**
     * @return int
     */
    public function getIsVegan(): bool|null
    {
        return $this->is_vegan;
    }
}
