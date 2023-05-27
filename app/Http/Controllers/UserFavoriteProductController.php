<?php

namespace App\Http\Controllers;

use App\Services\UserFavoriteProductService;
use Illuminate\Http\RedirectResponse;

class UserFavoriteProductController extends Controller
{
    public function addToFavorite(string $productArticle, UserFavoriteProductService $service): RedirectResponse
    {
        $service->addProductToFavorite($productArticle);

        return back();
    }
}
