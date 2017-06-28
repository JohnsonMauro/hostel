<h2>Adicione um ambiente</h2>

{!! Form::open(['url' => 'environment/add', 'id' => 'formQuarto']) !!}

  <div class="form-group">
    <label for="textName" class="control-label">Nome do quarto</label>
    <input id="textName" name="name" class="form-control" placeholder="Digite o nome do quarto..." type="text">
  </div>

  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Cômodos</label>
    <div class="row">
      <div class="col-md-2">
        @foreach($room as $r)
          <div class="checkbox">
            <label><input type="checkbox" name="room_id[]" value="{{$r->id}}">{{$r->description}}</label>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputSimpleDescription" class="control-label">Descrição Simples</label>
    <input id="inputSimpleDescription" name="simpleDescription" class="form-control" placeholder="Digite uma descrição" type="text">
  </div>
  
  <div class="form-group">
    <label for="inputValue" class="control-label">Valor</label>
    <input id="inputValue" name="value" class="form-control" placeholder="Digite o valor" type="number" min="0">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidade Adultos</label>
    <input id="inputValue" name="qtd_adult" class="form-control" placeholder="Digite a quantidade de adultos" type="number" min="0" value="0">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidades Crianças</label>
    <input id="inputValue" name="qtd_children" class="form-control" placeholder="Digite a quantidade de crianças" type="number" min="0" value="0">
  </div>

  <div class="form-group">
    <label for="inputValue" class="control-label">Quantidades de camas</label>
    <input id="inputValue" name="qtd_bed" class="form-control" placeholder="Digite a quantidade de camas" type="number" min="0" value="0">
  </div>

  <div class="form-group">
    <label for="inputLongDescription" class="control-label">Resumo</label>
    <textarea class="form-control" name="longDescription" id="inputLongDescription" rows="5" placeholder="Digite um resumo do quarto"></textarea>
  </div>
  <button type="reset" class="btn btn-danger">Limpar</button>
  <a href="{{action('IndexController@index')}}" class="btn btn-success">Voltar</a>
  <button type="submit" class="btn btn-primary">Enviar</button>
{!! Form::close() !!}
<br>
