@php
/** @var \App\Models\Category[] $categories */
$categories = !empty($categories) ? $categories : [];
@endphp
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Все категории</span>
                    </div>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('catalogue', ['category' => $category->getCode()]) }}">{{ $category->getName() }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="GET" action="{{ route('search') }}">
                            <input type="text" placeholder="Что хотите найти?" name="q">
                            <button type="submit" class="site-btn">Поиск</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{{ $phone }}</h5>
                            <span>Звонок оператору</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
