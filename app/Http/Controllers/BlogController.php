<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(BlogService $service, string $alias): View
    {
        return view('blog-details')
            ->with('article', $service->getArticle($alias))
            ->with('articleCategories', $service->getArticleCategories())
            ->with('recentArticles', $service->getRecentArticles())
            ->with('recommendArticles', $service->getRecommedArticles());
    }
}
