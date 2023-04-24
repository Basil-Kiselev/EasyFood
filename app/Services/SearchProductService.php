<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class SearchProductService
{
    public function getData(string $dataInput): Collection
    {
        return Product::query()
            ->where('name', 'LIKE', "%{$dataInput}%")
            ->get();
    }
}
