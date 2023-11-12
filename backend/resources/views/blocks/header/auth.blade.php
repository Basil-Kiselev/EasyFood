@if(\Illuminate\Support\Facades\Auth::check())
    <div class="header__top__right__auth">
        <a href="{{ route('login') }}"><i class="fa fa-user"></i> {{ \Illuminate\Support\Facades\Auth::user()->email }}</a>
    </div>
    <a href="{{ route('logout') }}" class="btn btn-outline-secondary btn-sm">Выйти</a>
@else
    <div class="header__top__right__auth">
        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Вход</a>
    </div>
@endif
