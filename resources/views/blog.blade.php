@php
/**
 * @var \App\Models\ArticleCategory $category
 * @var \App\Models\Article $article
 */

$recentArticles = !empty($recentArticles) ? $recentArticles : [];
@endphp
@extends('index')
@section('content')
@include('blocks.breadcrumbs')
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="{{ route('blog-search') }}" method="GET">
                            <input type="text" placeholder="Поиск..." name="value">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Категории</h4>
                            @foreach($articleCategories as $category)
                                <ul>
                                    <li><a href="{{ route('blog-category', $category->getCode()) }}">{{ $category->getName() }} ({{ $category->articles()->count() }})</a></li>
                                </ul>
                            @endforeach
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
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset($article->getImg()) }}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{ date_format($article->getCreatedAt(), 'o-F-d') }}</li>
                                    </ul>
                                    <h5><a href="{{ route('blog-details', $article->getAlias()) }}">{{ $article->getHeader() }}</a></h5>
                                    <p>{{ mb_substr($article->getText(), 0, 100) }}...</p>
                                    <a href="{{ route('blog-details', $article->getAlias()) }}" class="blog__btn">Читать полностью <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
