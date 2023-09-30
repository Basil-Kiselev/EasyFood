<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleSearchRequest;
use App\Services\BlogService;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(BlogService $service): View
    {
        return view('blog')
            ->with('articles', $service->getArticles());
    }

    public function viewArticle(BlogService $service, string $alias): View
    {
        return view('blog-details')
            ->with('article', $service->getArticle($alias))
            ->with('recommendArticles', $service->prepareArticlesDTO($service->getRecommendArticles()))
            ->with('articleCategories', $service->getArticleCategories())
            ->with('recentArticles', $service->prepareArticlesDTO($service->getRecentArticles()));
    }

    public function viewCategoryArticles(BlogService $service, string $categoryCode): View
    {
        return view('blog')
            ->with('articles', $service->getArticlesByCategory($categoryCode))
            ->with('breadcrumbsName', $service->getCaterogyName($categoryCode));
    }

    public function searchArticle(BlogService $service, ArticleSearchRequest $request): View
    {
        return view('blog')
            ->with('articles', $service->searchArticle($request->getSearchValue()))
            ->with('breadcrumbsName', $request->getSearchValue());
    }
}
