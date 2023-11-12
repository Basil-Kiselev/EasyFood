<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductRequest extends FormRequest
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
            'q.required' => 'Запрос обязателен'
        ];
    }

    public function getDataInput(): string
    {
        return $this->input('q');
    }
}
