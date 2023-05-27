<?php

namespace App\Services;

use App\Models\Product;
use App\Models\UserFavoriteProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserFavoriteProductService
{
    public function addProductToFavorite(string $productArticle): bool
    {
        $productId = Product::query()->where('article', $productArticle)->valueOrFail('id');

        $userFavoriteProductData = [
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'created_at' => Carbon::now(),
        ];
        UserFavoriteProduct::query()->insert($userFavoriteProductData);

        return true;
    }
}
