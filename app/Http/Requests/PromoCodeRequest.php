<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $cartId
 * @property string $promoCode
 */
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
            'promoCode' => 'required|string',
            'cartId' => 'required|int|exists:App\Models\Cart,id',
        ];
    }

    public function messages(): array
    {
        return [
            'promoCode.required' => 'Введите промокод',
            'promoCode.string' => 'Введите корректный код',
            'cartId.required' => 'Id обязателен',
            'cartId.int' => 'Id не корректен',
            'cartId.exists' => 'Корзина пуста или не найдена',
        ];
    }

    /**
     * @return string
     */
    public function getPromoCode(): string
    {
        return $this->promoCode;
    }

    public function getCartId(): int
    {
        return $this->cartId;
    }
}
