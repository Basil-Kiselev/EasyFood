<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** @property string $promoCode */
class PromoCodeRequest extends FormRequest
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
            'promoCode' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'promoCode.required' => 'Введите промокод',
            'promoCode.string' => 'Введите корректный код'
        ];
    }

    /**
     * @return string
     */
    public function getPromoCode(): string
    {
        return $this->promoCode;
    }
}
