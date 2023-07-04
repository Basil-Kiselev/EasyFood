<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $article
 * @property int $cartId
 */
class DeleteCartItemRequest extends FormRequest
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
            'article' => 'required|string|exists:App\Models\Product,article',
            'cartId' => 'required|int|exists:App\Models\Cart,id',
        ];
    }

    public function messages(): array
    {
        return [
            'article.required' => 'Артикль обязателен',
            'article.string' => 'Артикль не корректен',
            'article.exists' => 'Товар не найден',
            'cartId.required' => 'Id обязателен',
            'cartId.int' => 'Id не корректен',
            'cartId.exists' => 'Корзина пуста или не найдена',
        ];
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cartId;
    }
}
