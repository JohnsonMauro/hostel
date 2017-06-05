@extends('layout.page')

@section('content')
		<h1>Detalhes do quarto</h1><br>
		<h1>{{ $r->name }}</h1>

	<table clas="table">
	<ul>
		<li>
			<b>Descrição simples:</b> {{ $r->simple_description }} 
		</li>
		<li>
			<b>Descrição Completa:</b> {{ $r->long_description }} 
		 </li>
	</ul>
	</table>
@endsection