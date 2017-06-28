@extends('layouts.app')

@section('content')

<h2>Atualização do ambiente: {{ $r->name }}</h2>

<form id="formQuarto" action="/environment/update" method="post" data-toggle="validator" role="form">
  <input type="hidden" 
  name="_token" value="{{{ csrf_token() }}}" />

  <input type="hidden" name="id" value="{{$r->id}}">
  <input type="hidden" name="version" value="{{$r->version}}">

  <div class="form-group">
    <label for="textName" class="control-label">Nome do quarto</label>
    <input id="textName" name="name" value="{{$r->name}}" class="form-control" placeholder="Digite o nome do quarto..." type="text">
  </div>
  
   <div class="form-group">
    <label for="inputLongDescription" class="control-label">Cômodos</label>
    <div class="row">
      <div class="col-md-2">
        @foreach($rooms as $ros)
          <div class="checkbox">
            <label><input type="checkbox" name="room_id[]" value="{{$ros->id}}">{{$ros->description}}</label>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputSimpleDescription" class="control-label">Descrição Simples</label>
    <input id="inputSimpleDescription" name="simpleDescription" class="form-control" placeholder="Digite uma descrição" type="text" value="{{$r->simple_description}}">
  </div>
  
  <div class="form-group">
    <label for="inputValue" class="control-label">Valor</label>
    <input id="inputValue" name="value" class="form-control" placeholder="Digite o valor" type="number" min="0" value="{{$r->value}}">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidade Adultos</label>
    <input id="inputValue" name="qtd_adult" class="form-control" placeholder="Digite a quantidade de adultos" type="number" min="0" value="{{$r->qtd_adult}}">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidades Crianças</label>
    <input id="inputValue" name="qtd_children" class="form-control" placeholder="Digite a quantidade de crianças" type="number" min="0" value="{{$r->qtd_children}}">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidades de camas</label>
    <input id="inputValue" name="qtd_bed" class="form-control" placeholder="Digite a quantidade de camas" type="number" min="0" value="{{$r->qtd_bed}}">
  </div>

  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Resumo</label>
    <textarea class="form-control" name="longDescription" id="inputLongDescription" rows="5" placeholder="Digite um resumo do quarto">{{$r->long_description}}</textarea>
  </div>
  <button type="reset" class="btn btn-danger">Limpar</button>
  <a href="{{action('IndexController@index')}}" class="btn btn-success">Voltar</a>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection