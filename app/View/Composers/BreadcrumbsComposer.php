<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class BreadcrumbsComposer
{
    public function compose(View $view)
    {
        $breadcrumbsData = '';
        $currentRoute = Route::current()->getName();

        switch ($currentRoute) {
            case 'blog':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/blog',
                    'name' => 'Блог'
                ];
                break;
            case 'catalogue':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/catalogue',
                    'name' => 'Каталог'
                ];
                break;
            case 'cart':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/cart',
                    'name' => 'Корзина'
                ];
                break;
            case 'contact':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/contact',
                    'name' => 'Контакты'
                ];
                break;
            case 'checkout':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/checkout',
                    'name' => 'Оформление заказа'
                ];
                break;
            case 'product':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/catalogue',
                    'name' => 'Каталог',
                ];
                break;
            case 'favorites':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/favorites',
                    'name' => 'Избранное',
                ];
                break;
            case 'blog-category':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/blog',
                    'name' => 'Блог',
                ];
                break;
            case 'search':
                $breadcrumbsData = [
                    'url' => 'http://easyfood.local/search',
                    'name' => 'Поиск',
                ];
                break;
        }
        $view->with('breadcrumbs', $breadcrumbsData);
    }
}
