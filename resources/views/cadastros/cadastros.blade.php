@extends('layouts.app')

@section('content')
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Cadastros</h1>

        <div class="row">
          <div class="col-sm-2">
            <label>Clientes</label>
            <br />
            <a href="Clientes/Clientes.html"><i class="fa fa-5x fa-users"></i></a>
          </div>
          <div class="col-sm-2">
            <label>Funcionários</label>
            <br />
            <a href="Funcionarios/Funcionarios.html"><i class="fa fa-5x fa-users"></i></a>
          </div>
          <div class="col-sm-2">
            <label>Reservas</label>
            <br />
            <a href="Reservas/Reservas.html"><i class="fa fa-5x fa-pencil-square-o"></i></a>
          </div>
          <div class="col-sm-2">
            <label>Quartos</label>
            <br />
            <a href="Quartos/Quartos.html"><i class="fa fa-5x fa-building"></i></a>
          </div>
          <div class="col-sm-2">
            <label>Cômdos</label>
            <br />
            <a href="Comodos/Comodos.html"><i class="fa fa-5x fa-bath"></i></a>
          </div>
          <div class="col-sm-2">
            <label>Cardápios</label>
            <br />
            <a href="#"><i class="fa fa-5x fa-cutlery"></i></a>
          </div>
        </div>

      </div>
@endsection      