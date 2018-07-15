@extends('layouts.admin')

@section('content')
<div class="col-md-9">
    <div class="well well-sm">
        <div class="row">
            <div class="col-sm-6 col-md-2">
                <img src="{{asset('img/user/'.Auth::user()->avatar)}}" class="img-thumbnail pull-left" width="120px">
            </div>
            <div class="col-sm-6 col-md-8">
                <h4>Titular: {{ Auth::user()->name  }}</h4>
                <h4><cite title="carcas" ">Consorcio: {{ Auth::user()->consortiums->name  }}<i class="glyphicon glyphicon-map-marker"></i> </cite></h4>
                <h4>UF: {{ Auth::user()->uf_number  }}</h4>
                @if(Auth::user()->is_active)
                	Estado de cuenta: <span class="label label-success">Activo</span>
            	@elseif(Auth::user()->is_Inactive)
            		Estado de cuenta: <span class="label label-danger">Activo</span>
        		@endif
            </div>
        </div>
    </div>
</div>

@endsection