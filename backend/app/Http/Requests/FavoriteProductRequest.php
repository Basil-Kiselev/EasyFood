<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** @property string $productAlias */
class FavoriteProductRequest extends FormRequest
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
            'productAlias' => 'required|string|exists:App\Models\Product,article',
        ];
    }

    public function messages():array
    {
        return [
            'productAlias.required' => 'Код товара обязателен',
            'productAlias.string' => 'Код не корректен',
            'productAlias.exists' => 'Товар не найден',
        ];
    }

    /**
     * @return string
     */
    public function getProductAlias(): string
    {
        return $this->productAlias;
    }
}
