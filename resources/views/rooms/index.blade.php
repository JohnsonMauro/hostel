@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Listagem de quartos</h1>


	@if(isset($success))
		@if($success)
			<div class="alert alert-success" role="alert">Ambiente removido com sucesso</div>
		@else
			<div class="alert alert-danger" role="alert">Não foi possível remover o ambiente</div>
		@endif
	@endif

	@if(empty($rooms))
		<div>Você não tem nenhum quarto cadastrado.</div>
	@else

	<table class="table table-striped table-bordered table-hover">
		@forelse ($rooms as $r)
			<tr>
				<td>{{ $r->name }}</td>
				<td>{{ $r->simple_description }}</td>
				<td>
					<a href="/rooms/mostra/{{ $r->id }}">
						<span class="glyphicon glyphicon-search"></span>
					</a>
					<a href="/rooms/update/{{$r->id}}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="/rooms/delete/{{ $r->id }}">
						<span class="glyphicon glyphicon-remove"></span>
					</a>	
				</td>
			</tr>
		@endforeach
	</table>
	<a href="{{ action('RoomController@add') }}" class="btn btn-primary">Adicionar</a>
	@endif
</div>	
@endsection