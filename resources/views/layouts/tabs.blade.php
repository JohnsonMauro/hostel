@extends('layouts.app')

@section('content')

<ul class="nav nav-tabs">
    <li id="li1"><a data-toggle="tab" href="#menu1" onclick="renderPage('1', 'environment/add')">Ambientes</a></li>
    
    <li id="li2"><a data-toggle="tab" href="#menu2" onclick="renderPage('2', '/room')">Cômodos</a></li>
</ul>

<div class="tab-content">
    <div id="menu1" class="tab-pane fade">
      
    </div>
    <div id="menu2" class="tab-pane fade">
      
    </div>
  </div>
</div>


<script>
  function renderPage(number,page) 
  {
    let html = "";
     
    $.ajax({
      url: page,
      success: function(data) {
        $("#menu"+number).html(data);
        $("#menu"+number).addClass("in active");
      },
      complete: function()
      {
        $("#li" + number).tab('show');  
      }
    });
  }

  $(document).ready(function(){

  @if (Session::has('menu'))
    renderPage('{{ Session::get('menu') }}', '{{ Session::get('url') }}');
  @else
    renderPage("1", "environment/add");
  @endif

  });
</script>
@endsection