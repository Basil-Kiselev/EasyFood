<?php

namespace App\Http\Controllers;

use App\Services\UserFavoriteProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserFavoriteProductController extends Controller
{
    public function index(UserFavoriteProductService $service): View
    {
        $userId = Auth::id();

        return view('favorites')->with('favoriteProducts', $service->getFavoriteProducts($userId));
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
