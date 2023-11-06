@php
$breadcrumbs = !empty($breadcrumbs) ? $breadcrumbs : null;
$breadcrumbsName = !empty($breadcrumbsName) ? $breadcrumbsName : $breadcrumbs['name'];
@endphp
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $breadcrumbsName }}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home')}}">Главная</a>
                        <a href="{{ $breadcrumbs['url'] }}">{{ $breadcrumbs['name'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
