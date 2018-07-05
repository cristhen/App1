@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">Usuario {{$user->name}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar Usuario:</div>
                <div class="panel-body">
                    {!! Form::model($user, ['method'=>'PATCH','route'=>['editUser',$user],'files' => 'true']) !!}
          
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection