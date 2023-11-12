<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryApiController extends Controller
{
    public function getCategories(CategoryService $service): AnonymousResourceCollection
    {
        return CategoryResource::collection($service->getCategories());
    }
}
