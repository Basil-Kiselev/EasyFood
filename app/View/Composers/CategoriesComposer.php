<?php

namespace App\View\Composers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view): void
    {
        $categoryService = new CategoryService();
        $view->with('categories', $categoryService->getCategories());
    }
}
