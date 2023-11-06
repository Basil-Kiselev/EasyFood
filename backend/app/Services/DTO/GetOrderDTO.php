<?php

namespace App\Services\DTO;

class GetOrderDTO
{
    public function __construct
    (
        private string $name,
        private string $phone,
        private string|null $orderNotes,
        private DeliveryDetailDTO $deliveryDetailDTO,
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
     * @return GetOrderDTO
     */
    public function setName(string $name): GetOrderDTO
    {
        $this->name = $name;
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
     * @return GetOrderDTO
     */
    public function setPhone(string $phone): GetOrderDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return GetOrderDTO
     */
    public function setPrice(int $price): GetOrderDTO
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getFinalPrice(): int
    {
        return $this->finalPrice;
    }

    /**
     * @param int $finalPrice
     * @return GetOrderDTO
     */
    public function setFinalPrice(int $finalPrice): GetOrderDTO
    {
        $this->finalPrice = $finalPrice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderNotes(): ?string
    {
        return $this->orderNotes;
    }

    /**
     * @param string|null $orderNotes
     * @return GetOrderDTO
     */
    public function setOrderNotes(?string $orderNotes): GetOrderDTO
    {
        $this->orderNotes = $orderNotes;
        return $this;
    }

    /**
     * @return DeliveryDetailDTO
     */
    public function getDeliveryDetailDTO(): DeliveryDetailDTO
    {
        return $this->deliveryDetailDTO;
    }

    /**
     * @param DeliveryDetailDTO $deliveryDetailDTO
     * @return GetOrderDTO
     */
    public function setDeliveryDetailDTO(DeliveryDetailDTO $deliveryDetailDTO): GetOrderDTO
    {
        $this->deliveryDetailDTO = $deliveryDetailDTO;
        return $this;
    }
}
