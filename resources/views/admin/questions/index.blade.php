@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
	<h3 class="page-header" style="margin-top: 0%">Preguntas</h3>
	@if(\Session::has('message'))
    	@include('layouts.message')
	@endif
	
	<table id="consortium" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="40%">Pregunta</th>
                <th width="35%">Elección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->elections->name}}</td>
                <th>
                    <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-info btn-sm">Editar</a>
                    <button data-toggle="modal" data-target="#delete-{{$question->id}}" class="btn btn-danger btn-sm">Eliminar</button>
            	</th>
            </tr>
            @include('admin.questions.delete')
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Elección</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>          
</div>




@endsection