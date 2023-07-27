<?php

namespace App\View\Composers;

use App\Services\BlogService;
use Illuminate\View\View;

class BlogComposer
{
    public function compose(View $view)
    {
        $service = new BlogService();
        $view
            ->with('articleCategories', $service->getArticleCategories())
            ->with('recentArticles', $service->getRecentArticles());
    }
}
