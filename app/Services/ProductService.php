<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRelation;
use App\Services\DTO\FilterForCatalogueDTO;
use App\Services\DTO\GetProductCategoryDTO;
use App\Services\DTO\GetProductDTO;
use App\Services\DTO\GetRecommendedProductDTO;
use App\Services\DTO\GetRelatedProductDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public const COUNT_PAGINATE_PAGES = 3;

    /**
     * @return GetProductCategoryDTO[]
     */
    public function getRecommendedProduct(): array
    {
        /**
         * @var Collection $products
         * @var Category $category
         * @var Product $product
         */
        $products = Product::query()->where('is_recommend', 1)->get();
        $categoryIds = $products->unique('category_id')->pluck('category_id');
        $recommendedCategories = Category::query()->whereIn('id', $categoryIds)->get();
        $result = [];

        foreach ($recommendedCategories as $category) {
            $categoryDto = new GetProductCategoryDTO($category->getCode(), $category->getName());
            $categoryId = $category->getId();
            $recommendedProducts = $products->where('category_id', $categoryId);

            foreach ($recommendedProducts as $product) {
                $productDto = new GetRecommendedProductDTO(
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

    public function getProductsList(FilterForCatalogueDTO $dto): LengthAwarePaginator
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

    public function getProduct(string $article): GetProductDTO
    {
        /** @var Product $product */
        $product = Product::query()->where('article', $article)->firstOrFail();
        $vegan = !empty($product->isVegan()) ? 'Да' : 'Нет';

        if ($product->getUom() === 'volume') {
            $measureName = 'Объем';
            $measureType = 'мл';
            $measureValue = $product->getVolume();
            $measureByHundred = 'мл';
        } elseif ($product->getUom() === 'thing') {
            $measureName = 'Кол-во';
            $measureValue = '1';
            $measureType = 'шт';
            $measureByHundred = 'г';
        } elseif ($product->getUom() === 'weight') {
            $measureName = 'Вес';
            $measureType = 'г';
            $measureValue = $product->getWeight();
            $measureByHundred = 'г';
        }

        return new GetProductDTO(
            id: $product->getId(),
            article: $product->getArticle(),
            name : $product->getName(),
            description : $product->getDescription(),
            img : $product->getImg(),
            price : $product->getPrice(),
            measureName: $measureName,
            measureValue: $measureValue,
            measureType: $measureType,
            kcal: $product->getKcal(),
            protein: $product->getProtein(),
            fat: $product->getFat(),
            carbohydrate: $product->getCarbohydrate(),
            vegan: $vegan,
            measureByHundred: $measureByHundred,
        );
    }

    public function searchProducts(string $dataInput): Collection
    {
        return Product::query()
            ->where('name', 'LIKE', "%$dataInput%")
            ->get();
    }

    /** @return GetRelatedProductDTO[] */
    public function getRelatedProducts(string $article): array
    {
        /**
         * @var Product $currentProduct
         * @var ProductRelation $relatedProductForCurrentProduct
         * @var Product $relatedProduct
         */
        $currentProduct = Product::query()->where('article', $article)->firstOrFail();
        $currentProductId = $currentProduct->getId();
        $relatedProductsId = ProductRelation::query()->where('product_id', $currentProductId)->pluck('related_product_id');
        $relatedProducts = Product::query()->whereIn('id', $relatedProductsId)->get();

        $results = [];

        foreach ($relatedProducts as $relatedProduct) {
            $relatedProductDto = new GetRelatedProductDTO(
                $relatedProduct->getArticle(),
                $relatedProduct->getName(),
                $relatedProduct->getImg(),
                $relatedProduct->getPrice(),
            );
            $results[] = $relatedProductDto;
        }

        return $results;
    }

    public function getRecommendedProductCollection(): Collection
    {
        return Category::has('recommendProducts')->with('products')->get();
    }
}
