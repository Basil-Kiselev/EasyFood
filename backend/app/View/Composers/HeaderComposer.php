<?php

namespace App\View\Composers;

use App\Helpers\AuthHelper;
use App\Models\Setting;
use App\Services\CartService;
use App\Services\DTO\SettingDTO;
use App\Services\SettingService;
use App\Services\UserFavoriteProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();
        $favoriteProductService = new UserFavoriteProductService();
        $cartService = new CartService();

        $cartInfo = Auth::check() ? $cartService->getUserCartHeaderInfo(Auth::id()) : $cartService->getSessionCartHeaderInfo(AuthHelper::fingerprint());
        $countFavoriteProduct = Auth::check() ? $favoriteProductService->getCountFavoriteProducts(Auth::id()) : null;

        /** @var SettingDTO[] $settingsDto */
        $settingsDto = $settingService->getSettingsByCodes([
            Setting::CODE_FREE_DELIVERY,
            Setting::CODE_EMAIL
        ]);

        $settingsCollectionDto = collect($settingsDto);

        $settings = $settingsCollectionDto->mapWithKeys(function (SettingDTO $settingDto) {
            return [$settingDto->getCode() => $settingDto->getValue()];
        });

        $view
            ->with('freeDelivery', $settings['free_delivery_value'] ?? null)
            ->with('email', $settings['email'] ?? null)
            ->with('countFavoriteProducts', $countFavoriteProduct)
            ->with('cartInfo', $cartInfo);
    }
}
