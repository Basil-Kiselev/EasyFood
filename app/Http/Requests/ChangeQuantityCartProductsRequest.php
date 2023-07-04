<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $cartId
 * @property string $type
 * @property string $article
 */
class ChangeQuantityCartProductsRequest extends FormRequest
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
            'type' => 'required|in:dec,inc',
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
            'type.required' => 'Тип обязателен',
            'type.in' => 'Не корректный тип',
        ];
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cartId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }
}
