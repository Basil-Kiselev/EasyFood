@php
    /**
     * @var \App\Services\DTO\GetProductDTO $productInfo
     * @var \App\Services\DTO\GetRelatedProductDTO $relatedProduct
     */
    $productInfo = !empty($productInfo) ? $productInfo : [];
    $relatedProducts = !empty($relatedProducts) ? $relatedProducts : [];
@endphp
@extends('index')
@section('content')
    @include('blocks.breadcrumbs')
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ asset($productInfo->getImg()) }}"
                                 alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $productInfo->getName() }}</h3>
                        <div class="product__details__price">{{ $productInfo->getPrice() }} ₸</div>
                        <p>{{ $productInfo->getDescription() }}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <label>
                                        <input type="text" value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('addToCart', $productInfo->getArticle()) }}" class="primary-btn">В корзину</a>
                        <a href="{{ route('add-favorite', $productInfo->getArticle()) }}" class="heart-icon"><span
                                class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Энергетическая ценность на 100 {{ $productInfo->getMeasureByHundred() }}</b> <span>{{ $productInfo->getKcal() }} ккал</span>
                            </li>
                            <li><b>Белки</b> <span>{{ $productInfo->getProtein() }} г</span></li>
                            <li><b>Жиры</b> <span>{{ $productInfo->getFat() }} г</span></li>
                            <li><b>Углеводы</b> <span>{{ $productInfo->getCarbohydrate() }} г</span></li>
                            <li>
                                <b>{{ $productInfo->getMeasureName() }}</b>{{ $productInfo->getMeasureValue() }} {{ $productInfo->getMeasureType() }}
                                <span></span></li>
                            <li><b>Товар для вегетерианцев</b>{{ $productInfo->getVegan() }}<span></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Похожие товары</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($relatedProduct->getImg()) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ route('add-favorite', $relatedProduct->getArticle()) }}"><i
                                                class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('addToCart', $relatedProduct->getArticle()) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a href="{{ route('product', $relatedProduct->getArticle()) }}">{{ $relatedProduct->getName()}}</a>
                                </h6>
                                <h5>{{ $relatedProduct->getPrice() }} ₸</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
