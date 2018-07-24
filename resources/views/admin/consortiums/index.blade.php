@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
	<h3 class="page-header" style="margin-top: 0%">Consorcios UF</h3>
	@if(\Session::has('message'))
    	@include('layouts.message')
	@endif
	
	<button data-toggle="modal" data-target="#contact" class="btn btn-primary block">Consorcio</button><br><br>

	<table id="consortium" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consortium as $con)
            <tr>
                <td>{{$con->id}}</td>
                <td>{{$con->name}}</td>
                <th>
                    <a href="{{ route('consortiums.edit',$con->id) }}" class="btn btn-info btn-sm">Editar</a>
                    <button data-toggle="modal" data-target="#delete-{{$con->id}}" class="btn btn-danger btn-sm">Eliminar</button>
            	</th>
            </tr>
            @include('admin.consortiums.delete')
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>          
</div>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Nuevo Consorcio</h4>
            </div>
            <br>
            <form action="{{ route('consortiums.store') }}" method="post">
            	@csrf
            	<div class="modal-body" style="padding: 5px;">
                  	<div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <input class="form-control" name="nombre" placeholder="Ingrese el nombre del consorcio" type="text" required autofocus autocomplete="off" />
                        </div>
                    </div>
                </div>  
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-sm pull-right">
                      <span class="glyphicon glyphicon-ok"></span> Guardar 
                    </button>
                        
                    <button type="reset" class="btn btn-danger btn-sm pull-left">
                      <span class="glyphicon glyphicon-remove"></span> Cancelar 
                    </button><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection