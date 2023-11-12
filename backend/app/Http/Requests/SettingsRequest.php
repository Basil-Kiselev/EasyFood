<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array|null $codes
 */

class SettingsRequest extends FormRequest
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
            'codes' => 'array|required',
        ];
    }

    public function messages(): array
    {
        return [
            'codes.array' => 'Коды настроек должны быть массивом',
            'codes.required' => 'Коды настроек обязательны'
        ];
    }

    /**
     * @return array|null
     */
    public function getCodes(): ?array
    {
        return $this->codes;
    }
}
