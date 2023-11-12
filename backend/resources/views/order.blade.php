@php
$orderId = $orderId ?? null;
@endphp
@extends('index')
@section('content')
    <div class="" style="width: 500px; margin: auto;">
        <h4>
            Ваш заказ №{{ $orderId }}. Наш менеджер с вами свяжется для подтверждения.
        </h4>
    </div>
@endsection
