<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $password
 */
class RegistrationRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно',
            'name.string' => 'Имя должно быть строкой',
            'phone.required' => 'Телефон обязателен',
            'phone.numeric' => 'Номер не корректен',
            'email.required' => 'Email обязателен',
            'email.email' => 'Email не корректен',
            'email.unique' => 'Email занят',
            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль не короче 6 символов',
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
    public function getPhone(): string
    {
        return $this->phone;
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
    public function getPassword(): string
    {
        return $this->password;
    }
}
