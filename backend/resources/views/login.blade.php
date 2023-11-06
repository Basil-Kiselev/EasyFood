@extends('index')
@section('content')
    <div class="" style="width: 500px; margin: auto;">
        <form style="width: 400px; margin: auto; padding: 50px; " action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3" style="text-align: center;">
                <label for="email" class="form-label">Почта</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @else is-valid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="email" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @else is-valid @enderror" id="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success" style="margin: 0 auto; display: block;">Войти</button>
            <a href="{{ route('registration') }}">Регистрация</a>
        </form>
    </div>
@endsection
