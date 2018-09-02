@extends('layouts.admin')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <img src="{{asset('img/user/'.Auth::user()->avatar)}}" class="img-thumbnail pull-left" width="170px">
            </div>
            <div class="col-md-8">
            <h4>Titular: {{ Auth::user()->name  }}</h4>
            <h4><cite title="carcas" ">Consorcio: {{ Auth::user()->consortiums->name  }}<i class="glyphicon glyphicon-map-marker"></i> </cite></h4>
            <h4>Unidad Familiar: {{ Auth::user()->uf_number  }}</h4>
            @if(Auth::user()->is_active)
                Estado de cuenta: <span class="label label-success">Activo</span>
            @elseif(Auth::user()->is_Inactive)
                Estado de cuenta: <span class="label label-danger">Activo</span>
            @endif
            </div>
            
        </div>
    </div>
    
    @if(Auth::user()->is_user)
    <div class="well well-sm">        
        @if($election)
            <a class="btn btn-primary" href="{{ route('votes',$election ) }}">Votar</a>
            
        @endif
        @if($finish)
            <a class="btn btn-info" href="{{ route('votes.finished')}}">Resultados</a>
        @endif    
        
    </div>
    @endif
    
    @if(Auth::user()->change == 0)
    <div class="well well-sm">
        Recuerde cambiar su contraseña
    </div>
    @endif

    @if(\Session::has('message'))
        @include('layouts.message')
    @endif

    @if(\Session::has('error'))
        @include('layouts.error')
    @endif
</div>

@endsection