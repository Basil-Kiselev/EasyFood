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
        $userId = Auth::id();
        $productId = Product::query()->where('article', $productArticle)->valueOrFail('id');
        $favoriteProduct = UserFavoriteProduct::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!empty($favoriteProduct)) {
            return false;
        } else {
            $userFavoriteProductData = [
                'user_id' => $userId,
                'product_id' => $productId,
                'created_at' => Carbon::now(),
            ];
            UserFavoriteProduct::query()->insert($userFavoriteProductData);

            return true;
        }
    }

    public function getFavoriteProducts()
    {
        $userId = Auth::id();
        $favoriteProductsIds = UserFavoriteProduct::query()->where('user_id', $userId)->pluck('product_id');
        $favoriteProducts = Product::query()->whereIn('id', $favoriteProductsIds)->get();

        return $favoriteProducts;
    }

    public function removeProductFromFavorite(string $productArticle): bool
    {
        $userId = Auth::id();
        $productId = Product::query()->where('article', $productArticle)->valueOrFail('id');
        $favoriteProductQuery = UserFavoriteProduct::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId);

        if (!empty($favoriteProductQuery->first())) {
            $favoriteProductQuery->delete();
        }

        return true;
    }

    public function getCountFavoriteProducts(): int
    {
        $userId = Auth::id();
        $countProducts = UserFavoriteProduct::query()->where('user_id', $userId)->count();

        return $countProducts;
    }
}
