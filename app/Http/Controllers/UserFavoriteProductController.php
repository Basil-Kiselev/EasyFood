<?php

namespace App\Http\Controllers;

use App\Services\UserFavoriteProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserFavoriteProductController extends Controller
{
    public function index(UserFavoriteProductService $service): View
    {
        return view('favorites')->with('favoriteProducts', $service->getFavoriteProducts());
    }

    public function addToFavorite(string $productArticle, UserFavoriteProductService $service): RedirectResponse
    {
        $service->addProductToFavorite($productArticle);

        return back();
    }

    public function removeFromFavorite(string $productArticle, UserFavoriteProductService $service): RedirectResponse
    {
        $service->removeProductFromFavorite($productArticle);

        return back();
    }
}
