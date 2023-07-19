<?php

namespace App\Services\DTO;

class RegistrationNewUserDTO
{
    public function __construct
    (
        private string $name,
        private string $email,
        private string $phone,
        private string $password,
    ){}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RegistrationNewUserDTO
     */
    public function setName(string $name): RegistrationNewUserDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return RegistrationNewUserDTO
     */
    public function setEmail(string $email): RegistrationNewUserDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return RegistrationNewUserDTO
     */
    public function setPhone(string $phone): RegistrationNewUserDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return RegistrationNewUserDTO
     */
    public function setPassword(string $password): RegistrationNewUserDTO
    {
        $this->password = $password;
        return $this;
    }
}
