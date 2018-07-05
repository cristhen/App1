@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Consorcio {{$consortium->name}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar consorcio:</div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{route('editConsortium',$consortium)}}">
                        @csrf
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control" required value="{{$consortium->name}}">
                        </div>
                        <button class="btn btn-primary">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection