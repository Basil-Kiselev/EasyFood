@php
/** @var \Illuminate\Support\MessageBag $errors */
@endphp
@extends('index')
@section('content')
    <div class="" style="width: 500px; margin: auto;">
        <form style="width: 400px; margin: auto; padding: 50px; " action="{{ route('registration') }}" method="post">
            @csrf
            <div class="mb-3" style="text-align: center;">
                <label for="name" class="form-label">Ваше имя</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @else is-valid @enderror" id="name" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="email" class="form-label">Почта</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @else is-valid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @else is-valid @enderror" id="password" placeholder="Минимум 6 символов">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @else is-valid @enderror" id="phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success" style="margin: 0 auto; display: block;">Зарегистрироваться</button>
        </form>
    </div>
@endsection
