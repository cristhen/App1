
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="voting">
    <meta name="author" content="Cristiam Henriquez">
    <link rel="icon" href="../../favicon.ico">

    <title>UF</title>

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    
  </head>

  <body>
    @if(Auth::user()->is_admin)
      <nav class="navbar navbar-default navbar-fixed-top">
    @elseif(Auth::user()->is_user)
      <nav class="navbar navbar-inverse navbar-fixed-top">
    @endif  
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UF</a>
        </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
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
    </nav><br>
    <br>
    <br>
    <br>

    <div class="container-fluid">
      <div class="row">
        @if(Auth::user()->is_admin)
        <div class="col-lg-3 col-md-3 col-sm-4">

          <div class="panel panel-primary">
            <div class="panel-heading">Menu</div>

            <div class="panel-body">
              
              <a class="list-group-item" href="#navbar">Inicio</a>
              <a class="list-group-item" href="{{ route('consortiums')}}">Consorcios</a>
              <a class="list-group-item" href="{{ route('users.index') }}">Usuarios</a>
              <a class="list-group-item" href="{{ route('questions.index')}}">Preguntas</a>
              <a class="list-group-item" href="{{ route('elections.index') }}">Votaciones</a>
            </div>
          </div>
            
        </div>
          
      @elseif(Auth::user()->is_user)
        <div class="col-lg-3 col-md-3 col-sm-4">
          
          <div class="panel panel-success">
            <div class="panel-heading">Menu</div>

            <div class="panel-body">
              <a class="list-group-item" href="#navbar">Inicio</a>
              <a class="list-group-item" href="#buttons">Votación</a>
            </div>
          </div>
            
        </div>
      @endif          
        
        @yield('content')
        
        
      </div>
    </div>

    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>

    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    

    <script>
      $(document).ready(function() {
        $('#users').DataTable();
        $('#consortium').DataTable();
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
