@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
    <h3 class="page-header" style="margin-top: 0%">Votación </h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('home') }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Votación {{ $election->name }}</div>
                <div class="panel-body">
                    <form action="{{ route('votes.store') }}" method="post">
                        <div class="row vote-results results">
                            @csrf
                            @foreach($questions as $question)
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <h4>
                                        <span class="label label-default">{{ $question->question}}</span><br>
                                    </h4>
                                    <input type="hidden" name="elections_id" value="{{ $question->elections_id }}">
                                    <input type="hidden" name="questions_id[]" value="{{ $question->id }}">
                                    <select name="votes[]" class="selectpicker">
                                        <option value="A" data-content="<span class='label label-success'>Aprobar</span>">Aprobar</option>
                                        <option value="N" data-content="<span class='label label-warning'>Abstenerse</span>">Abstenerse</option>
                                        <option value="C" data-content="<span class='label label-danger'>En contra</span>">En contra</option>
                                    </select>
                                </div>
                            @endforeach
                        </div><br>
                        <button type="submit" class="btn btn-primary">Confirmar votación</button> 
                    </form>
                </div>
            </div>
        </div>    
    </div>

</div>

@endsection