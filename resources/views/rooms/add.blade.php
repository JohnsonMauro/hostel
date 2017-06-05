@extends('layout.page')

@section('content')

<h2>Adicione um ambiente</h2>

<form id="formQuarto" action="/rooms/add" method="POST" data-toggle="validator" role="form">
  <input type="hidden" 
  name="_token" value="{{{ csrf_token() }}}" />

  <div class="form-group">
    <label for="textName" class="control-label">Nome do quarto</label>
    <input id="textName" name="name" class="form-control" placeholder="Digite o nome do quarto..." type="text">
  </div>
  
  <div class="form-group">
    <label for="inputSimpleDescription" class="control-label">Descrição Simples</label>
    <input id="inputSimpleDescription" name="simpleDescription" class="form-control" placeholder="Digite uma descrição" type="text">
  </div>
  
  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Resumo</label>
    <textarea class="form-control" name="longDescription" id="inputLongDescription" rows="5" placeholder="Digite um resumo do quarto"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
  <button type="reset" class="btn btn-primary">Limpar</button>
  <a href="{{action('RoomController@index')}}" class="btn btn-success">Voltar</a>
</form>

@endsection