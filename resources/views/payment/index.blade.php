@extends('layouts.app')

@section('content')
	
<h1>Central de pagamento</h1>

{!! Form::open(['action' => 'PaymentController@submit']) !!}
    
    <button class="btn btn-success" type="submit">Pagar</button>
{!! Form::close() !!}
	
@endsection