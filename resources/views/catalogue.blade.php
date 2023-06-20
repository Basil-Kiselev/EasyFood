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
                <h5>Категория</h5>
                <form>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected value="all">Все категории</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->getCode() }}">{{ $category->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Минимальная цена</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price_min" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label @error('price_max') is-invalid @else is-valid @enderror">Максимальная цена</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price_max">
                        @error('price_max')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_vegan" value="1">
                        <label class="form-check-label" for="exampleCheck1">Вегетерианская еда</label>
                    </div>
                    <button type="submit" class="btn btn-success">Применить</button>
                </form>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ $product->getImg() }}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{ route('add-favorite', $product->getArticle()) }}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
