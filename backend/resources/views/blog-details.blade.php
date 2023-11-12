@php
/**
 * @var \App\Models\ArticleCategory[] $articleCategories
 * @var \App\Services\DTO\GetArticlesDTO $article
*/
$articleCategories = !empty($articleCategories) ? $articleCategories : [];
$recentArticles = !empty($recentArticles) ? $recentArticles : [];
$recommendArticles = !empty($recommendArticles) ? $recommendArticles : [];
@endphp
@extends('index')
@section('content')
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{ asset('img/blog/details/details-hero.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{ $article->getHeader() }}</h2>
                    <ul>
                        <li>{{ $article->getDateCreated() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Найти...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Категории</h4>
                        <ul>
                            @foreach($articleCategories as $articleCategory)
                                <li><a href="{{ route('blog-category', $articleCategory->getCode()) }}">{{ $articleCategory->getName() }} ({{ $articleCategory->articles()->count() }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Недавние статьи</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($recentArticles as $recentArticle)
                                <a href="{{ route('blog-details', $recentArticle->getAlias()) }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img style="width: 80px" src="{{ asset($recentArticle->getImg()) }}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{ $recentArticle->getHeader() }}</h6>
                                        <span>{{ $recentArticle->getDateCreated() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{ asset($article->getImg()) }}" alt="">
                    <p>{{ $article->getText() }}</p>
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Категория:</span> {{ $article->getArticleCategory() }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Эти статьи могу вам понравиться</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($recommendArticles as $article)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset($article->getImg()) }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>{{ $article->getDateCreated() }}</li>
                            </ul>
                            <h5><a href="{{ route('blog-details', $article->getAlias()) }}">{{ $article->getHeader() }}</a></h5>
                            <p>{{ mb_substr($article->getText(), 0, 100) }}...</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blog Section End -->
@endsection
