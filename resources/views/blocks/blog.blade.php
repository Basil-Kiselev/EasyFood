@php
/** @var \App\Services\DTO\GetArticlesDTO $article */

$articles = !empty($articles) ? $articles : [];
@endphp
<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Статьи из блога</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset($article->getImg()) }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ $article->getDateCreated() }}</li>
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
<!-- Blog Section End -->
