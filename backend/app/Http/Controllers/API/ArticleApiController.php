<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesApiRequest;
use App\Http\Requests\ArticleSearchRequest;
use App\Http\Resources\ArticleCategoryResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleShortResource;
use App\Services\BlogService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleApiController extends Controller
{
    public function getArticles(ArticlesApiRequest $request, BlogService $service): AnonymousResourceCollection
    {
        $type = $request->getType();
        $categoryId = $request->getCategoryId();

        return ArticleShortResource::collection($service->getArticlesCollection($categoryId, $type));
    }

    public function getArticleCategories(BlogService $service): AnonymousResourceCollection
    {
        return ArticleCategoryResource::collection($service->getArticleCategories());
    }

    public function searchArticles(ArticleSearchRequest $request, BlogService $service): AnonymousResourceCollection
    {
        return ArticleShortResource::collection($service->searchArticle($request->getSearchValue()));
    }

    public function getArticle(string $alias, BlogService $service): ArticleResource
    {
        return new ArticleResource($service->getArticle($alias));
    }
}
