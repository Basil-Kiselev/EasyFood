<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 */
class SubscribeRequest extends FormRequest
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
            'email' => 'required|email|unique:App\Models\NewsletterSubscriber,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите email',
            'email.email' => 'Email не корректен',
            'email.unique' => 'Вы уже подписаны',
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
