<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Services\Dto\CatalogueDto;
use App\Services\Dto\CategoryDto;
use App\Services\Dto\ProductDto;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
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
                $productDto = new ProductDto(
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

    public function getProductsList(CatalogueDto $dto): Collection
    {
        $query = Product::query();

        if (!empty($dto->getCategory()) && $dto->getCategory() !== 'all') {
            $categoryId = Category::query()->where('code', $dto->getCategory())->get('id')->pluck('id');
            $query = $query->where('category_id', $categoryId);
        }

        if (!empty($dto->getMinPrice())) {
            $query = $query->where('price', '>=', $dto->getMinPrice());
        }

        if (!empty($dto->getMaxPrice())) {
            $query = $query->where('price', '<=', $dto->getMaxPrice());
        }

        if (!empty($dto->getIsVegan())) {
            $query = $query->where('is_vegan', $dto->getIsVegan());
        }

        return $query->get();
    }
}
