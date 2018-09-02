<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="voting">
    <meta name="author" content="Cristiam Henriquez">
    <link rel="icon" href="../../favicon.ico">

    <title>Unidad Familiar</title>

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/card_alerts.css')}}">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class="pull-left" width="60px" src="{{ asset('img/edif.png') }}" alt="Apartamento">  
          <a class="navbar-brand" href="{{ route('home') }}">
            Consorcio: {{ Auth::user()->consortiums->name }} - UF: {{ Auth::user()->uf_number  }}
          </a>  
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav ">
            @if(Auth::user()->is_master)
              <li><a href="{{ route('home') }}">Inicio</a></li>
              <li><a href="{{ route('consortiums.index')}}">Consorcios</a></li>
              <li><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li><a href="{{ route('questions.index')}}">Preguntas</a></li>
              <li><a href="{{ route('elections.index') }}">Votaciones</a></li>
            @elseif(Auth::user()->is_admin)        
              <li><a href="{{ route('home') }}">Inicio</a></li>
              <li><a href="{{ route('users.index') }}">Usuarios</a></li>
              <li><a href="{{ route('questions.index')}}">Preguntas</a></li>
              <li><a href="{{ route('elections.index') }}">Votaciones</a></li>
            @elseif(Auth::user()->is_user)
              <li><a href="{{ route('home') }}">Inicio</a></li>
            @endif         
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown active">
              
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('users.edit',Auth::user()->id ) }}" class="dropdown-item">Editar perfil</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>      
    <div class="container-fluid">
      <div class="row">
        @yield('content')
      </div>
    </div>
    @stack('scripts')
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/jquery.canvasjs.min.js')}}"></script>

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>

    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap.min.js')}}"></script>

    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    
    <script src="{{asset('js/vote.js')}}"></script>

    <script>
      $(document).ready(function() {
        var table = $('#users').DataTable({
          responsive: true
        });

        var table2 = $('#consortium').DataTable({
          responsive: true
        });

        var table3 = $('#questions').DataTable({
          responsive: true
        });

        new $.fn.dataTable.FixedHeader(table,table2,table3);

        $('.selectpicker').selectpicker();
      }); 
      $(document).on('ready',funcionPrincipal());
      function funcionPrincipal(){
          $('#btnNew').on('click',createInput);
          $('#tabla').on('click','.btn-danger',deleteInput);
      }

      function deleteInput(){
          $(this).parent().parent().remove();
      }

      function createInput(){
          $('#tabla')
          .append($('<tr>')
                  .append($('<td>')
                      .append($('<input>')
                          .addClass('form-control')
                          .attr('type','text')
                          .attr('name','question[]')
                          .attr('placeholder','Ingrese la pregunta ¿?')
                          .attr('autocomplete', 'off')
                      )
                  )
                  .append($('<td>')
                      .addClass('text-center')
                      .append($('<button>')
                          .addClass('btn btn-danger btn-xs')
                          .text('X')
                      )
                  )
          );
      }
    </script>

    

  </body>
</html>
