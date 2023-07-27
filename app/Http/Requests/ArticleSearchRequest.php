<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** @property string $value */
class ArticleSearchRequest extends FormRequest
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
            'value' => 'string',
        ];
    }
    public function messages(): array
    {
        return [
            'value.string' => 'Запрос должен быть строкой',
        ];
    }

    /**
     * @return string
     */
    public function getSearchValue(): string
    {
        return $this->value;
    }
}
