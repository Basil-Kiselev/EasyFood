@php
/** @var \App\Services\DTO\GetContactsDTO $contactsData */
$contactsData = !empty($contactsData) ? $contactsData : new \App\Services\DTO\GetContactsDTO('', '', '', '', '',);
@endphp
@extends('index')
@section('content')
@include('blocks.breadcrumbs')
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Телефон</h4>
                    <p>{{ $contactsData->getPhone() }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Адрес</h4>
                    <p>{{ $contactsData->getAddress() }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Время работы</h4>
                    <p>с {{ $contactsData->getTimeOpen() }} до {{ $contactsData->getTimeClose() }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Почта</h4>
                    <p>{{ $contactsData->getEmail() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2566.666712296641!2d82.63082453858495!3d49.96135423013737!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2skz!4v1689824129302!5m2!1sru!2skz" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Усть-каменогорск</h4>
            <ul>
                <li>Телефон: {{ $contactsData->getPhone() }}</li>
                <li>Адрес: {{ $contactsData->getAddress() }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Оставьте сообщение</h2>
                </div>
            </div>
        </div>
        <form class="js-feedback-message" action="{{ route('contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input name="name" type="text" placeholder="Ваше имя">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="email" type="text" placeholder="Ваша почта">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="text" placeholder="Ваше сообщение"></textarea>
                    <button type="submit" class="site-btn js-feedback-btn">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
@endsection
