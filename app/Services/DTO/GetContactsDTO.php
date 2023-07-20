<?php

namespace App\Services\DTO;

class GetContactsDTO
{
    public function __construct
    (
        private string $phone,
        private string $address,
        private string $email,
        private string $timeOpen,
        private string $timeClose,
    ){}

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return GetContactsDTO
     */
    public function setPhone(string $phone): GetContactsDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return GetContactsDTO
     */
    public function setAddress(string $address): GetContactsDTO
    {
        $this->address = $address;
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
     * @return GetContactsDTO
     */
    public function setEmail(string $email): GetContactsDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOpen(): string
    {
        return $this->timeOpen;
    }

    /**
     * @param string $timeOpen
     * @return GetContactsDTO
     */
    public function setTimeOpen(string $timeOpen): GetContactsDTO
    {
        $this->timeOpen = $timeOpen;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeClose(): string
    {
        return $this->timeClose;
    }

    /**
     * @param string $timeClose
     * @return GetContactsDTO
     */
    public function setTimeClose(string $timeClose): GetContactsDTO
    {
        $this->timeClose = $timeClose;
        return $this;
    }
}
