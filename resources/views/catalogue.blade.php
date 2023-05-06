@php
/**
 * @var \App\Models\Category $categories
 * @var \App\Models\Product $product
*/
$categories = !empty($categories) ? $categories : [];
$products = !empty($products) ? $products : [];
@endphp
@extends('index')
@section('content')
@include('blocks.breadcrumbs')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4><a href="{{ route('catalogue') }}">Категории</a></h4>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{ route('catalogue', ['category' => $category->getCode()]) }}">{{ $category->getName() }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h5>Цена</h5>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="0" data-max="3000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h5>Вегатерианский товар</h5>
                        <div class="sidebar__item__size">
                            <label for="vegan">
                                Да
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="no_vegan">
                                Нет
                                <input type="radio" id="no_vegan">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Сортировка</span>
                                <select>
                                    <option value="0">Цена</option>
                                    <option value="0">Ккал</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Товаров</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product->getImg() }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $product->getName() }}</a></h6>
                                    <h5>{{ $product->getPrice() }} ₸</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
