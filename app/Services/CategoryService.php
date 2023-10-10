<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getCategories(): Collection
    {
        return Category::has('products')->get();
    }

    public function getCategoryName(string|null $code): string|null
    {
        return Category::query()->where('code', $code)->value('name');
    }
}
