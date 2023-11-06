<?php

namespace App\Services\DTO;

class DeliveryDetailDTO
{
    public function __construct
    (
        private string $street,
        private string $building,
        private string|null $apartment,
    ){}

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return DeliveryDetailDTO
     */
    public function setStreet(string $street): DeliveryDetailDTO
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuilding(): string
    {
        return $this->building;
    }

    /**
     * @param string $building
     * @return DeliveryDetailDTO
     */
    public function setBuilding(string $building): DeliveryDetailDTO
    {
        $this->building = $building;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    /**
     * @param string|null $apartment
     * @return DeliveryDetailDTO
     */
    public function setApartment(?string $apartment): DeliveryDetailDTO
    {
        $this->apartment = $apartment;
        return $this;
    }
}
