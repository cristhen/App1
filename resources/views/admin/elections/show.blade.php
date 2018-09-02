@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
    @if($election->active == 0)
        <h3 class="page-header" style="margin-top: 0%">Elección Activa </h3>
    @else
        <h3 class="page-header" style="margin-top: 0%">Elección Finalizada </h3>
    @endif
    
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    @if($election->active == 0)
        <a class="btn btn-default block" href="{{ route('elections.active') }}">Atras</a>
        <a class="btn btn-primary block pull-right" href="{{ route('electionFinish',$election) }}">Finalizar Elección</a><br><br>
    @else
        <a class="btn btn-default block" href="{{ route('elections.finished') }}">Atras</a><br><br>
    @endif
    
    @if($election->active == 0)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Eleccion | {{ $election->name }}  <strong class="pull-right">Monto Acumulado: $ {{ $election->amount }} </strong></div>
                <div class="panel-body">
                   <div class="row vote-results results">
                    @foreach($votes as $vote)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px;">
                            <h2>
                                {{ $vote->questions->question }}
                                <a href="{{ route('elections.edit',$vote->questions_id) }}" class="btn btn-info">Editar </a>
                            </h2>
                            A favor
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote->approved}}%" title="{{$vote->approved}} votos">
                                </div>
                            </div>
                            Abstenerse
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote->abstain}}%" title="{{$vote->abstain}} votos">
                                </div>
                            </div>
                            En contra
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{$vote->against}}%" title="{{$vote->against}} votos">
                                </div>
                            </div>
                            
                        </div>
                    @endforeach



                </div>
                </div>
            </div>
        </div>    
    </div>
    @else
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Eleccion | {{ $election->name }} <strong class="pull-right">Monto Acumulado: $ {{ $election->amount }} </strong>  </div>
                    <div class="panel-body">
                       <div class="row vote-results results">
                        
                        @foreach($votes as $vote)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px;">
                                <h2>
                                    {{ $vote->questions->question }}
                                </h2>
                                A favor : {{ round(($vote->approved * 100) / ($vote->approved + $vote->abstain + $vote->against)) }} %
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{ round(($vote->approved * 100) / ($vote->approved + $vote->abstain + $vote->against)) }}%" title="{{ round(($vote->approved * 100) / ($vote->approved + $vote->abstain + $vote->against)) }}%">
                                    </div>
                                </div>
                                Abstenerse : {{ round( ($vote->abstain * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }} %
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{ round( ($vote->abstain * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }}%" title="{{ round( ($vote->abstain * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }}%">
                                    </div>
                                </div>
                                En contra : {{ round( ($vote->against * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }} %
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="1000" style="width: {{ round( ($vote->against * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }}%" title="{{ round( ($vote->against * 100) / ($vote->approved + $vote->abstain + $vote->against) ) }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    @endif

</div>

@endsection