@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
    <h3 class="page-header" style="margin-top: 0%">Elección Finalizada </h3>
    <a class="btn btn-default block" href="{{ route('votes.finished') }}">Atras</a><br><br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Eleccion | {{ $election->name }}</div>
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
</div>

@endsection