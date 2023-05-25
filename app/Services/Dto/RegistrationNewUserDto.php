<?php

namespace App\Services\Dto;

class RegistrationNewUserDto
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
     * @return RegistrationNewUserDto
     */
    public function setName(string $name): RegistrationNewUserDto
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
     * @return RegistrationNewUserDto
     */
    public function setEmail(string $email): RegistrationNewUserDto
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
     * @return RegistrationNewUserDto
     */
    public function setPhone(string $phone): RegistrationNewUserDto
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
     * @return RegistrationNewUserDto
     */
    public function setPassword(string $password): RegistrationNewUserDto
    {
        $this->password = $password;
        return $this;
    }
}
