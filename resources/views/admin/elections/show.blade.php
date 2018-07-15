@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <h3 class="page-header" style="margin-top: 0%">Elección Activas UF</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('elections.active') }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Eleccion</div>
                <div class="panel-body">
                   <div class="row vote-results results">
                    @foreach($votes as $vote)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px;">
                            <p class="pull-right">{{ $vote[0]->questions->elections->name }}</p>
                            <h2>
                                {{ $vote[0]->questions->question }}
                                <a href="{{ route('elections.edit',$vote[0]->questions_id) }}" class="btn btn-info">Editar </a>
                            </h2>
                            A favor
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote[0]->approved}}%" title="{{$vote[0]->approved}} votos">
                                </div>
                            </div>
                            Abstenerse
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote[0]->abstain}}%" title="{{$vote[0]->abstain}} votos">
                                </div>
                            </div>
                            En contra
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote[0]->against}}%" title="{{$vote[0]->against}} votos">
                                </div>
                            </div>
                            
                        </div>
                    @endforeach



                </div>
                </div>
            </div>
        </div>    
    </div>

</div>

@endsection