@php
/**
 * @var \App\Models\Product $favoriteProduct
*/
$favoriteProducts = !empty($favoriteProducts) ? $favoriteProducts : [];

@endphp
@extends('index')
@section('content')
@include('blocks.breadcrumbs')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    @foreach($favoriteProducts as $favoriteProduct)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ $favoriteProduct->getImg() }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('product', $favoriteProduct->getArticle()) }}">{{ $favoriteProduct->getName() }}</a></h6>
                                    <h5>{{ $favoriteProduct->getPrice() }} ₸</h5>
                                    <form action="{{ route('delete-favorite', $favoriteProduct->getArticle()) }}" method="post">
                                        @csrf
                                        <button class="btn-info" type="submit">Убрать из избранного</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
