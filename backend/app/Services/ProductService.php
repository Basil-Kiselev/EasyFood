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

    public function getProductsList(FilterForCatalogueDTO $filters): LengthAwarePaginator
    {
        $query = Product::query();

        if (!empty($filters->getCategory()) && $filters->getCategory() !== 'all') {
            $categoryId = Category::query()->where('code', $filters->getCategory())->value('id');
            $query = $query->where('category_id', $categoryId);
        }

        if (is_numeric($filters->getMinPrice())) {
            $query = $query->where('price', '>=', $filters->getMinPrice());
        }

        if (is_numeric($filters->getMaxPrice())) {
            $query = $query->where('price', '<=', $filters->getMaxPrice());
        }

        if (!empty($filters->getIsVegan())) {
            $query = $query->where('is_vegan', $filters->getIsVegan());
        }

        return $query->paginate(ProductService::COUNT_PAGINATE_PAGES);
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
        } else  {
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

    public function searchProducts(string $dataInput): LengthAwarePaginator
    {
        return Product::query()
            ->where('name', 'LIKE', "%$dataInput%")
            ->paginate(self::COUNT_PAGINATE_PAGES);
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
