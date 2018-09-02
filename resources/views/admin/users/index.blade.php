@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
	<h3 class="page-header" style="margin-top: 0%">Usuarios UF</h3>
    <button data-toggle="modal" data-target="#user" class="btn btn-primary">Usuarios</button><br><br>
	
    @if(\Session::has('message'))
    	@include('layouts.message')
	@endif

    @if (count($errors) > 0)
        @include('layouts.errors')
    @endif
	
	<table id="users" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th >Avatar</th>
                <th >Nombre</th>
                <th >Email</th>
                <th >Role</th>
                <th >Consorcio</th>
                <th >Uf number</th>
                <th >Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($users as $user)
            <tr>
                <td>
                    <img src="{{asset('img/user/'.$user->avatar)}}" class="img-thumbnail" width="50px">
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->is_master)
                        <p>Master</p>
                    @elseif($user->is_admin)
                        <p>Administrador</p>
                    @elseif($user->is_user)
                        <p>Usuario</p>
                    @endif
                </td>
                <td>{{$user->consortiums->name}}</td>
                <td>{{$user->uf_number}}</td>
                <td>
                    @if($user->is_active)
                        <p>Activo</p>
                    @elseif($user->is_Inactive)
                        <p>Inactivo</p>
                    @endif
                </td>
                <th>
                    <a href="{{ route('users.edit',$user->id) }}" type="button" class="btn btn-info btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <button data-toggle="modal" data-target="#delete-{{$user->id}}" class="btn btn-danger btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
            	</th>
            </tr>
            @include('admin.users.delete')
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th >Avatar</th>
                <th >Nombre</th>
                <th >Email</th>
                <th >Role</th>
                <th >Consorcio</th>
                <th >Uf number</th>
                <th >Activo</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>          
</div>

<!-- modal user create-->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Nuevo Usuario</h4>
            </div>
            <br>
            
            {!! Form::open(['route' => 'users.store', 'files' => 'true']) !!}
            	{!! Form::token() !!}
            	<div class="modal-body" >
                    @include('admin.users.partials.form')
                </div>  
            {!! Form::close() !!}
        </div>
    </div>
</div>



@endsection