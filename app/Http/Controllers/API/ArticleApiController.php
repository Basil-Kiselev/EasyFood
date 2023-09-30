<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesApiRequest;
use App\Http\Resources\ArticleShortResource;
use App\Services\BlogService;

class ArticleApiController extends Controller
{
    public function getArticles(ArticlesApiRequest $request, BlogService $service)
    {
        $type = $request->getType();
        $category = $request->getCategory();

        return ArticleShortResource::collection($service->getArticlesCollection($category, $type));
    }
}
