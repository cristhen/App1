@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar pregunta: {{$question->question}}</div>
                @if (count($errors) > 0)
                        @include('layouts.errors')
                    @endif
                <div class="panel-body">
                    {!! Form::model($question,['route'=>['questions.update',$question]]) !!}
                        @method('patch')
                        @csrf
                            @include('admin.questions.partials.form')
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection