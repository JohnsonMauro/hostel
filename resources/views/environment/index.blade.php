@extends('layouts.app')

@section('content')
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>

        @if(isset($success))
		@if($success)
			<div class="alert alert-success" role="alert">Ambiente removido com sucesso</div>
		@else
			<div class="alert alert-danger" role="alert">Não foi possível remover o ambiente</div>
		@endif
	@endif

	<table class="table table-striped table-bordered table-hover">
		@forelse ($rooms as $r)
			<tr>
				<td>{{ $r->name }}</td>
				<td>{{ $r->simple_description }}</td>
				<td>
					<a href="/environment/mostra/{{ $r->id }}">
						<span class="glyphicon glyphicon-search"></span>
					</a>
					<a href="/environment/update/{{$r->id}}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="/environment/delete/{{ $r->id }}">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
					<a href="/payment/submit/{{ $r->id }}">
						<span>Pagar</span>
					</a>	
				</td>
			</tr>
		@empty
					<div>Você não tem nenhum quarto cadastrado.</div>	
		@endforelse
	</table>
	<a href="{{ action('IndexController@index') }}" class="btn btn-primary">Adicionar</a>

      </div>
@endsection