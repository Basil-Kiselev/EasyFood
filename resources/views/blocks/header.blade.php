<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ route('home') }}"><img src="img/logo2.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        @include('blocks.header.cart')
    </div>
    <div class="humberger__menu__widget">
        @include('blocks.header.auth')
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        @include('blocks.header.main-menu')
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__contact">
        @include('blocks.header.info')
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        @include('blocks.header.info')
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        @include('blocks.header.auth')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="img/logo2.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    @include('blocks.header.main-menu')
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @include('blocks.header.cart')
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
