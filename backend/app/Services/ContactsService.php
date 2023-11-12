<?php

namespace App\Services;

use App\Models\FeedbackMessage;
use App\Models\Setting;
use App\Services\DTO\GetContactsDTO;
use App\Services\DTO\SettingDTO;

class ContactsService
{
    public function getContactsData(): GetContactsDTO
    {
        $settingService = new SettingService();

        /** @var SettingDTO[] $settingsDto */
        $settingsDto = $settingService->getSettingsByCodes([
            Setting::CODE_PHONE,
            Setting::CODE_ADDRESS,
            Setting::CODE_EMAIL,
            Setting::CODE_WORKDAY_START,
            Setting::CODE_WORKDAY_END
        ]);

        $settingsCollectionDto = collect($settingsDto);

        $settings = $settingsCollectionDto->mapWithKeys(function (SettingDTO $settingDto) {
            return [$settingDto->getCode() => $settingDto->getValue()];
        });

        return new GetContactsDTO(
            phone: $settings['phone'],
            address: $settings['address'],
            email: $settings['email'],
            timeOpen: $settings['workday_start'],
            timeClose: $settings['workday_end'],
        );
    }

    public function createMessage(string $name, string $email, string $text): bool
    {
        return FeedbackMessage::createMessage($name, $email, $text);
    }
}
