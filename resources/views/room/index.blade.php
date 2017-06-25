<h3> Cadastro de cômodos</h3>

{!! Form::open(['url' => 'room']) !!}
  <div class="form-group">
    <label for="textName" class="control-label">Nome do cômodo</label>
    <input id="textName" name="description" class="form-control" placeholder="Digite o cômodo..." type="text">
  </div>
  
  <button type="reset" class="btn btn-primary">Limpar</button>
  <a href="{{action('EnvironmentController@index')}}" class="btn btn-success">Voltar</a>
  <button type="submit" class="btn btn-primary">Enviar</button>
{!! Form::close() !!}
