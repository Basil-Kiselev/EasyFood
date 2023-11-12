<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** @property string $q */
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
            'q' => 'string|required',
        ];
    }
    public function messages(): array
    {
        return [
            'q.string' => 'Запрос должен быть строкой',
            'q.required' => 'Запрос обязателен',
        ];
    }

    /**
     * @return string
     */
    public function getSearchValue(): string
    {
        return $this->q;
    }
}
