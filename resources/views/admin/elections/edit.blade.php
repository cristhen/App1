@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <h3 class="page-header" style="margin-top: 0%">Elección => {{ $questionVote->questions->elections->name }}</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('elections.show',$questionVote->questions->elections_id) }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Pregunta => {{ $questionVote->questions->question }} </div>
                <div class="panel-body">

                    <div class="col-md-4">
                        <div class="notice notice-success">
                            <strong>Aprovados</strong> {{ $questionVote->approved }} votos
                        </div>    
                    </div>
                    
                    <div class="col-md-4">
                        <div class="notice notice-warning">
                            <strong>Abstenerse</strong>  {{ $questionVote->abstain }} votos
                        </div>    
                    </div>

                    <div class="col-md-4">
                        <div class="notice notice-danger"> 
                            <strong>Rechazada</strong> {{ $questionVote->against }} votos
                        </div>        
                    </div>

                    <form class="form-horizontal" method="post" action="{{ route('elections.update', $questionVote) }}">
                        @method('patch')
                        {!! Form::token() !!}
                        <div class="col-md-12">
                            <div class="notice notice-lg">
                                <div class="form-group">
                                  {!! Form::label('approved', 'Votos aprovados') !!}
                                  {!! Form::text('approved', null, ['class' => 'form-control'])!!}
                                </div>

                                <div class="form-group">
                                  {!! Form::label('abstain', 'Votos Abstenerse') !!}
                                  {!! Form::text('abstain', null, ['class' => 'form-control'])!!}
                                </div>

                                <div class="form-group">
                                  {!! Form::label('against', 'Votos Rechazados') !!}
                                  {!! Form::text('against', null, ['class' => 'form-control'])!!}
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
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</div>

@endsection