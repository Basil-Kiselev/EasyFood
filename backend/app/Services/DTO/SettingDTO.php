<?php

namespace App\Services\DTO;

class SettingDTO
{
    public function __construct
    (
     private string $code,
     private string $value,
    ){}

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return SettingDTO
     */
    public function setCode(string $code): SettingDTO
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return SettingDTO
     */
    public function setValue(string $value): SettingDTO
    {
        $this->value = $value;
        return $this;
    }
}
