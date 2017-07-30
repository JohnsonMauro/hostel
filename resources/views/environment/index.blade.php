@extends('layouts.app')

@section('content')
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard</h1>

        <div class="row">
          <div class="col-xs-2">
            <label>Data</label>
            <input type="text" class="form-control" placeholder="__/__/____">
          </div>
          <div class="col-xs-2">
            <br />
            <button type="button" class="btn btn-primary">Pesquisar</button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Quarto</th>
                <th>Disponibilização</th>
                <th>Serviços</th>
                <th>Adicional</th>
                <th>Valor</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Quarto 01</td>
                <td>Disponivél</td>
                <td>Serviço 01</td>
                <td>Adicional 01</td>
                <td>100,00</td>
              </tr>
              <tr>
                <td>Quarto 02</td>
                <td>Disponivél</td>
                <td>Serviço 02</td>
                <td>Adicional 02</td>
                <td>100,00</td>
              </tr>
              <tr>
                <td>Quarto 03</td>
                <td>Disponivél</td>
                <td>Serviço 03</td>
                <td>Adicional 03</td>
                <td>100,00</td>
              </tr>
              <tr>
                <td>Quarto 04</td>
                <td>Disponivél</td>
                <td>Serviço 04</td>
                <td>Adicional 04</td>
                <td>100,00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
@endsection