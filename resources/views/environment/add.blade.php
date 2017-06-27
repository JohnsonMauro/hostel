<h2>Adicione um ambiente</h2>

{!! Form::open(['url' => 'environment/add', 'id' => 'formQuarto']) !!}

  <div class="form-group">
    <label for="textName" class="control-label">Nome do quarto</label>
    <input id="textName" name="name" class="form-control" placeholder="Digite o nome do quarto..." type="text">
  </div>

  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Cômodos</label>
    <br>
    @foreach($room as $r)
      <input type="checkbox" name="room_id[]" value="{{$r->id}}">{{$r->description}}<br>
    @endforeach
  </div>
  
  <div class="form-group">
    <label for="inputSimpleDescription" class="control-label">Descrição Simples</label>
    <input id="inputSimpleDescription" name="simpleDescription" class="form-control" placeholder="Digite uma descrição" type="text">
  </div>
  
  <div class="form-group">
    <label for="inputValue" class="control-label">Valor</label>
    <input id="inputValue" name="value" class="form-control" placeholder="Digite o valor" type="number">
  </div>

  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Resumo</label>
    <textarea class="form-control" name="longDescription" id="inputLongDescription" rows="5" placeholder="Digite um resumo do quarto"></textarea>
  </div>
  <button type="reset" class="btn btn-primary">Limpar</button>
  <a href="{{action('IndexController@index')}}" class="btn btn-success">Voltar</a>
  <button type="submit" class="btn btn-primary">Enviar</button>
{!! Form::close() !!}
