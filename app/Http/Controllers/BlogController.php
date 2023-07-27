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
            ->with('recommendArticles', $service->getRecommedArticles());
    }

    public function viewCategoryArticles(BlogService $service, string $categoryCode): View
    {
        return view('blog')
            ->with('articles', $service->getArticlesByCategory($categoryCode));
    }

    public function searchArticle(BlogService $service, ArticleSearchRequest $request): View
    {
        return view('blog')
            ->with('articles', $service->searchArticle($request->getSearchValue()));
    }
}
