@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar consorcio: {{$consortium->name}}</div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{route('editConsortium',$consortium)}}">
                        @csrf
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control" required value="{{$consortium->name}}">
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-default btn-sm pull-left" href="{{ route('consortiums') }}">atras</a>
                            
                            <button type="submit" class="btn btn-primary btn-sm pull-right">
                              <span class="glyphicon glyphicon-ok"></span> Guardar 
                            </button><br><br>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection