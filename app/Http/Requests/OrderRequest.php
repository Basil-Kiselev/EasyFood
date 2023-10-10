<?php

namespace App\Http\Requests;

use App\Services\DTO\DeliveryDetailDTO;
use App\Services\DTO\GetOrderDTO;
use App\Services\DTO\RegistrationNewUserDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $street
 * @property string $building
 * @property string|null $apartment
 * @property string $phone
 * @property string|null $order_notes
 * @property string|null $email
 * @property string|null $password
 * @property bool $createAcc
 */
class OrderRequest extends FormRequest
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
            'street' => 'required|string',
            'building' => 'required|string',
            'apartment' => 'string|nullable',
            'phone' => 'required|numeric',
            'email' => 'email|nullable|required_if:createAcc,1',
            'password' => 'string|nullable|required_if:createAcc,1|min:6',
            'orderNotes' => 'string|nullable',
            'createAcc' => 'bool',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно',
            'name.string' => 'Имя не корректно',
            'street.required' => 'Введите улицу',
            'street.string' => 'Улица не корректна',
            'building.required' => 'Введите номер дома',
            'building.string' => 'Номер дома не корректен',
            'apartment.string' => 'Квартира или офис не корректны',
            'phone.required' => 'Телефон обязателен',
            'phone.numeric' => 'Телефон не корректен',
            'email.required_if' => 'Введите емаил',
            'email.email' => 'Почта не корректна',
            'password.required_if' => 'Введите пароль',
            'password.string' => 'Пароль не корректен',
            'password.min' => 'Пароль не короче 6 символов',
            'orderNotes.string' => 'Описание не корректно'
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
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * @return string|null
     */
    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getOrderNotes(): ?string
    {
        return $this->order_notes;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isCreateAcc(): bool
    {
        return $this->createAcc;
    }

    public function composeOrderDTO(): GetOrderDTO
    {
        return new GetOrderDTO(
            name: $this->input('name'),
            phone: $this->input('phone'),
            orderNotes: $this->input('orderNotes'),
            deliveryDetailDTO: new DeliveryDetailDTO(
                $this->input('street'),
                $this->input('building'),
                $this->input('apartment'),
            ),
        );
    }

    public function composeNewUserDTO(): RegistrationNewUserDTO
    {
        return new RegistrationNewUserDTO(
            name: $this->input('name'),
            email: $this->input('email'),
            phone: $this->input('phone'),
            password: $this->input('password'),
        );
    }
}
