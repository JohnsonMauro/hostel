@extends('layouts.app')

@section('content')

echo '<a href='https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code={{$code}}'>Ir para o Checkout</a>';

@endsection