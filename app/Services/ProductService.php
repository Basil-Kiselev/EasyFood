<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Services\Dto\FilterForCatalogueDto;
use App\Services\Dto\CategoryDto;
use App\Services\Dto\ProductDto;
use App\Services\Dto\RecommendedProductDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public const COUNT_PAGINATE_PAGES = 3;

    public function getRecommendedProduct(): array
    {
        /** @var Collection $products */
        /** @var Category $category */
        /** @var Product $product */
        $products = Product::query()->where('is_recommend', 1)->get();
        $categoryIds = $products->unique('category_id')->pluck('category_id');
        $recommendedCategories = Category::query()->whereIn('id', $categoryIds)->get();
        $result = [];

        foreach ($recommendedCategories as $category) {
            $categoryDto = new CategoryDto($category->getCode(), $category->getName());
            $categoryId = $category->getId();
            $recommendedProducts = $products->where('category_id', $categoryId);

            foreach ($recommendedProducts as $product) {
                $productDto = new RecommendedProductDto(
                    $product->getArticle(),
                    $product->getName(),
                    $product->getImg(),
                    $product->getPrice(),
                );
                $categoryDto->addProduct($productDto);
            }
            $result[] = $categoryDto;
        }

        return $result;
    }

    public function getProductsList(FilterForCatalogueDto $dto): LengthAwarePaginator
    {
        $query = Product::query();

        if (!empty($dto->getCategory()) && $dto->getCategory() !== 'all') {
            $categoryId = Category::query()->where('code', $dto->getCategory())->value('id');
            $query = $query->where('category_id', $categoryId);
        }

        if (is_numeric($dto->getMinPrice())) {
            $query = $query->where('price', '>=', $dto->getMinPrice());
        }

        if (is_numeric($dto->getMaxPrice())) {
            $query = $query->where('price', '<=', $dto->getMaxPrice());
        }

        if (!empty($dto->getIsVegan())) {
            $query = $query->where('is_vegan', $dto->getIsVegan());
        }

        return $query->paginate(ProductService::COUNT_PAGINATE_PAGES)->withQueryString();
    }

    public function getProduct($article): ProductDto
    {
        /** @var Product $product */
        $product = Product::query()->where('article', $article)->first();
        $vegan = !empty($product->isVegan()) ? 'Да' : 'Нет';

        if ($product->getVolume() && !$product->getWeight()) {
            $measureName = 'Объем';
            $measureType = 'мл';
            $measureValue = $product->getVolume();
            $measureByHundred = 'мл';
        } elseif (!$product->getVolume() && !$product->getWeight()) {
            $measureName = 'Кол-во';
            $measureValue = '1';
            $measureType = 'шт';
            $measureByHundred = 'г';
        } else {
            $measureName = 'Вес';
            $measureType = 'г';
            $measureValue = $product->getWeight();
            $measureByHundred = 'г';
        }

        return new ProductDto(
            $product->getArticle(),
            $product->getName(),
            $product->getDescription(),
            $product->getImg(),
            $product->getPrice(),
            $measureName,
            $measureValue,
            $measureType,
            $product->getKcal(),
            $product->getProtein(),
            $product->getFat(),
            $product->getCarbohydrate(),
            $vegan,
            $measureByHundred,
        );
    }

    public function searchProducts(string $dataInput): Collection
    {
        return Product::query()
            ->where('name', 'LIKE', "%$dataInput%")
            ->get();
    }
}
