<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $email
 * @property string $text
 */
class FeedbackMessageRequest extends FormRequest
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
            'name' => 'string|required',
            'email' => 'email|required',
            'text' => 'string|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Имя не корректно',
            'email.required' => 'Введите почту',
            'email.email' => 'Почта не корректна',
            'text.required' => 'Введите ваше сообщение',
            'text.string' => 'Сообщение не корректно',
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
