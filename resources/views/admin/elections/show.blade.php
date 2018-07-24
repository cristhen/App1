@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
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
                <div class="panel-heading">Eleccion | {{ $election->name }}</div>
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
    @else
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Eleccion | {{ $election->name }}</div>
                    <div class="panel-body">
                       <div class="row vote-results results">
                        
                        @foreach($votes as $vote)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 5px;">
                                @push('scripts')
                                <script>
                                    window.onload = function () {

                                    var options{{ $vote[0]->questions_id }} = {
                                        animationEnabled: true,
                                        title: {
                                            text: "ACME Corporation Apparel Sales"
                                        },
                                        data: [{
                                            type: "doughnut",
                                            innerRadius: "40%",
                                            showInLegend: true,
                                            legendText: "{label}",
                                            indexLabel: "{label}: #percent%",
                                            dataPoints: [
                                                { label: "Department Stores", y: 6492917 },
                                                { label: "Discount Stores", y: 7380554 },
                                                { label: "Stores for Men / Women", y: 1610846 },
                                            ]
                                        }]
                                    };
                                    $(".chartContainer{{ $vote[0]->questions_id }}").CanvasJSChart(options{{ $vote[0]->questions_id }});

                                    }
                                </script>
                                @endpush

                                <div class="chartContainer{{ $vote[0]->questions_id }}" style="height: 300px; width: 100%;"></div>    
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