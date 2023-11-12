@extends('index')
@section('content')
    @include('blocks.hero')
    @include('blocks.breadcrumbs')
@php
/** @var \Illuminate\Database\Eloquent\Collection $foundProducts */
/** @var \App\Models\Product $product */
@endphp
@if(!empty($foundProducts->all()))
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="row">
                        @foreach($foundProducts as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset($product->getImg()) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ route('add-favorite', $product->getArticle()) }}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('addToCart', $product->getArticle()) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{ route('product', $product->getArticle()) }}">{{ $product->getName() }}</a></h6>
                                        <h5>{{ $product->getPrice() }} ₸</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        {{ $foundProducts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <p class="section-title py-4" style="font-size: 1.5rem">Товары не найдены</p>
@endif
@endsection
