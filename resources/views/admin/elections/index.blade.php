@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <h3 class="page-header" style="margin-top: 0%">Elección UF</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <button data-toggle="modal" data-target="#election" class="btn btn-primary block">Eleccion +</button><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Elecciones Activas</div>
                <div class="panel-body">
                    <a class="list-group-item" href="{{ route('elections.active') }}">Votaciones</a>
                </div>
            </div>
        </div>    
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-success">
                <div class="panel-heading">Elecciones Finalizadas</div>
                <div class="panel-body">
                    <a class="list-group-item" href="{{ route('elections.index') }}">Votaciones</a>
                </div>
            </div>
        </div>    
    </div>
    
         
</div>

<div class="modal fade" id="election" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Nueva Elección</h4>
            </div>
            <br>
            <div class="modal-body" style="padding: 5px;">
                <form action="{{ route('elections.store') }}" method="post">
                    @csrf
                    @include('admin.elections.partials.form')
                </form>
            </div>
        </div>
    </div>
</div>



@endsection