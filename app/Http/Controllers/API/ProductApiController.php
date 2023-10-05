<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteProductRequest;
use App\Http\Requests\FilterForCatalogueRequest;
use App\Http\Requests\SearchProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductShortResource;
use App\Http\Resources\RecommendedProductResource;
use App\Services\DTO\FilterForCatalogueDTO;
use App\Services\ProductService;
use App\Services\UserFavoriteProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    public function getProducts(FilterForCatalogueRequest $request, ProductService $service): AnonymousResourceCollection
    {
        $DTO = new FilterForCatalogueDTO(
            $request->getCategory(),
            $request->getPriceMin(),
            $request->getPriceMax(),
            $request->getIsVegan(),
        );

        return ProductShortResource::collection($service->getProductsList($DTO));
    }

    public function getProduct(string $article, ProductService $service): ProductResource
    {
        return new ProductResource($service->getProduct($article));
    }

    public function searchProducts(SearchProductRequest $request, ProductService $service): AnonymousResourceCollection
    {
        return ProductShortResource::collection($service->searchProducts($request->getDataInput()));
    }

    public function getRecommendedProducts(ProductService $service): AnonymousResourceCollection
    {
        return RecommendedProductResource::collection($service->getRecommendedProductCollection());
    }

    public function getUserFavoriteProducts(UserFavoriteProductService $service): AnonymousResourceCollection
    {
        $userId = auth('sanctum')->id();

        return ProductShortResource::collection($service->getFavoriteProducts($userId));
    }

    public function addToUserFavoriteProducts(UserFavoriteProductService $service, FavoriteProductRequest $request): AnonymousResourceCollection
    {
        $userId = auth('sanctum')->id();
        $productAlias = $request->getProductAlias();

        return ProductShortResource::collection($service->addProductToFavorite($userId, $productAlias));
    }

    public function removeProductFromFavorite(UserFavoriteProductService $service, FavoriteProductRequest $request): AnonymousResourceCollection
    {
        $userId = auth('sanctum')->id();
        $productAlias = $request->getProductAlias();

        return ProductShortResource::collection($service->removeProductFromFavorite($userId, $productAlias));
    }
}
