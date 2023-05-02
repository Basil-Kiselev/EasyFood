@php
/** @var \Illuminate\Support\MessageBag $errors */
@endphp
@extends('index')
@section('content')
    <div class="" style="width: 500px; margin: auto;">
        <form style="width: 400px; margin: auto; padding: 50px; " action="{{ route('registration') }}" method="post">
            @csrf
            <div class="mb-3" style="text-align: center;">
                <label for="exampleInputEmail1" class="form-label">Ваше имя</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                @if(!empty($errors->get('name')))
                    @foreach($errors->get('name') as $error)
                        <ul>
                            <li class="alert-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="exampleInputEmail1" class="form-label">Почта</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @if(!empty($errors->get('email')))
                    @foreach($errors->get('email') as $error)
                        <ul>
                            <li class="alert-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Минимум 6 символов">
                @if(!empty($errors->get('password')))
                    @foreach($errors->get('password') as $error)
                        <ul>
                            <li class="alert-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="mb-3" style="text-align: center;">
                <label for="exampleInputPassword1" class="form-label">Телефон</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                @if(!empty($errors->get('phone')))
                    @foreach($errors->get('phone') as $error)
                        <ul>
                            <li class="alert-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-success" style="margin: 0 auto; display: block;">Зарегистрироваться</button>
        </form>
    </div>
@endsection
