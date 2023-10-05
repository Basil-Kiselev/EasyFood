<?php

namespace App\Services;

use App\Models\Product;
use App\Models\UserFavoriteProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserFavoriteProductService
{
    public function addProductToFavorite(int $userId, string $productArticle): Collection
    {
        $productId = Product::query()->where('article', $productArticle)->valueOrFail('id');
        $favoriteProduct = UserFavoriteProduct::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (empty($favoriteProduct)) {
            $userFavoriteProductData = [
                'user_id' => $userId,
                'product_id' => $productId,
                'created_at' => Carbon::now(),
            ];
            UserFavoriteProduct::query()->insert($userFavoriteProductData);
        }

        return $this->getFavoriteProducts($userId);
    }

    public function getFavoriteProducts(int $userId): Collection
    {
        $favoriteProductsIds = UserFavoriteProduct::query()->where('user_id', $userId)->pluck('product_id');

        return Product::query()->whereIn('id', $favoriteProductsIds)->get();
    }

    public function removeProductFromFavorite(int $userId, string $productArticle): Collection
    {
        $productId = Product::query()->where('article', $productArticle)->valueOrFail('id');
        $favoriteProductQuery = UserFavoriteProduct::query()
            ->where('user_id', $userId)
            ->where('product_id', $productId);

        if (!empty($favoriteProductQuery->first())) {
            $favoriteProductQuery->delete();
        }

        return $this->getFavoriteProducts($userId);
    }

    public function getCountFavoriteProducts(): int
    {
        $userId = Auth::id();
        $countProducts = UserFavoriteProduct::query()->where('user_id', $userId)->count();

        return $countProducts;
    }
}
