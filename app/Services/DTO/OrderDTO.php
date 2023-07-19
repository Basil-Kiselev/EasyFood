<?php

namespace App\Services\DTO;

class OrderDTO
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
     * @return OrderDTO
     */
    public function setName(string $name): OrderDTO
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
     * @return OrderDTO
     */
    public function setPhone(string $phone): OrderDTO
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
     * @return OrderDTO
     */
    public function setPrice(int $price): OrderDTO
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
     * @return OrderDTO
     */
    public function setFinalPrice(int $finalPrice): OrderDTO
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
     * @return OrderDTO
     */
    public function setOrderNotes(?string $orderNotes): OrderDTO
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
     * @return OrderDTO
     */
    public function setDeliveryDetailDTO(DeliveryDetailDTO $deliveryDetailDTO): OrderDTO
    {
        $this->deliveryDetailDTO = $deliveryDetailDTO;
        return $this;
    }
}
