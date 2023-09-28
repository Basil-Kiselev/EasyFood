<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Services\CategoryService;

class CategoryApiController extends Controller
{
    public function getCategories(CategoryService $service): CategoryCollection
    {
        return new CategoryCollection($service->getCategories());
    }
}
