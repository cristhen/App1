@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <h3 class="page-header" style="margin-top: 0%">Elección Activas UF</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('elections.index') }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Elecciones</div>
                <div class="panel-body">
                    @foreach($elections as $election)
                        <a class="list-group-item" href="{{ route('elections.show',$election->id ) }}">{{ $election->name }}</a>
                    @endforeach  
                </div>
            </div>
        </div>    
    </div>

    
    
         
</div>









@endsection