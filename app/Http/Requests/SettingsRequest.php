<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string|null $type
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
            'type' => 'string|nullable',
            'codes' => 'array|nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'type.string' => 'Тип должен быть строкой',
            'codes.array' => 'Коды должны быть массивом',
        ];
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return array|null
     */
    public function getCodes(): ?array
    {
        return $this->codes;
    }
}
