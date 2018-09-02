@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
	<h3 class="page-header" style="margin-top: 0%">Preguntas</h3>
	@if(\Session::has('message'))
    	@include('layouts.message')
	@endif
	
	<table id="questions" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Pregunta</th>
                <th>Elección</th>
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
                    <a href="{{ route('questions.edit',$question->id) }}" type="button" class="btn btn-info btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <button data-toggle="modal" data-target="#delete-{{$question->id}}" class="btn btn-danger btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
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