@if(!empty($recCategories))
    @php
        /** @var \App\Services\DTO\GetProductCategoryDTO $recCategory */
    @endphp<!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Рекомендуемые товары</h3>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Все</li>
                            @foreach($recCategories as $recCategory)
                                <li data-filter=".{{ $recCategory->getCode() }}">{{ $recCategory->getName() }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($recCategories as $recCategory)
                    @foreach($recCategory->getProducts() as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $recCategory->getCode() }}">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset($product->getImg()) }}">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{ route('add-favorite', $product->getArticle()) }}"><i
                                                        class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('addToCart', $product->getArticle()) }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6>
                                        <a href="{{ route('product', $product->getArticle()) }}">{{ $product->getName() }}</a>
                                    </h6>
                                    <h5>{{ $product->getPrice() }} ₸</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- Featured Section End -->
