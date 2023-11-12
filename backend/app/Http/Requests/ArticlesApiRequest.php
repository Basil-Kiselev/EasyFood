<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string|null $type
 * @property int|null $categoryId
 */

class ArticlesApiRequest extends FormRequest
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
            'category_id' => 'nullable|integer',
            'type' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
          'category_id.integer' => 'Id не корректен',
          'type.string' => 'Тип должен быть строкой',
        ];
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->input('type');
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->input('category_id');
    }


}
