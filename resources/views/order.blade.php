@php
$orderId = $orderId ?? null;
@endphp
@extends('index')
@section('content')
    <div class="" style="width: 500px; margin: auto;">
        <h4>
            Ваш заказ №{{ $orderId }} оформлен. Наш менеджер вам перезвонит.
        </h4>
    </div>
@endsection
