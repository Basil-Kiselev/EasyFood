<?php

namespace App\Services;

use App\Models\FeedbackMessage;
use App\Models\Setting;
use App\Services\DTO\GetContactsDTO;

class ContactsService
{
    public function getContactsData(): GetContactsDTO
    {
        $service = new SettingService();

        return new GetContactsDTO(
            phone: $service->getSettingByCode(Setting::CODE_PHONE),
            address: $service->getSettingByCode(Setting::CODE_ADDRESS),
            email: $service->getSettingByCode(Setting::CODE_EMAIL),
            timeOpen: $service->getSettingByCode(Setting::CODE_WORKDAY_START),
            timeClose: $service->getSettingByCode(Setting::CODE_WORKDAY_END),
        );
    }

    public function createMessage(string $name, string $email, string $text): bool
    {
        return FeedbackMessage::createMessage($name, $email, $text);
    }
}
