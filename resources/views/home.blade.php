@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @if(Auth::user()->is_admin)
        <h1 class="page-header label-primary">
            <span class="label label-primary">Administracion UF</span>
        </h1>
    @else
        <h1 class="page-header label-success">
            <span class="label label-success">Usuario UF</span>
        </h1>
    @endif
          
</div>

@endsection