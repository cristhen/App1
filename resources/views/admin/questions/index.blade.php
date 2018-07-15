@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
	<h3 class="page-header" style="margin-top: 0%">Preguntas</h3>
	@if(\Session::has('message'))
    	@include('layouts.message')
	@endif
	
	<button data-toggle="modal" data-target="#question" class="btn btn-primary block">Pregunta</button><br><br>

	<table id="consortium" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="70%">Pregunta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->question}}</td>
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
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>          
</div>

<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Nueva Pregunta</h4>
            </div>
            <br>
        	<div class="modal-body" style="padding: 5px;">
                {!! Form::open(['route' => 'questions.store']) !!}
                {!! Form::token() !!}
                    @include('admin.questions.partials.form')
                {!! Form::close() !!}
            </div>  
          	</form>
        </div>
    </div>
</div>



@endsection