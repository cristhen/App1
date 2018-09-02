@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
    <h3 class="page-header" style="margin-top: 0%">Elección Finalizadas UF</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('elections.index') }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Elecciones</div>
                <div class="panel-body">

                    <table id="consortium" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                            @if(Auth::user()->is_master)
                                <th>Elección</th>
                                <th>Consorcio</th>
                                <th>Fecha</th>
                            @else
                                <th>Elección</th>
                                <th>Fecha</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($elections as $election)
                                @if(Auth::user()->is_master)
                                    <tr>
                                        <td>
                                            <a class="list-group-item" style="text-decoration:none;" href="{{ route('elections.show',$election->id ) }}">{{ $election->name }}</a>
                                        </td>
                                        <td>
                                            {{ $election->consortiums->name }}
                                        </td>
                                        <td>
                                            {{ $election->updated_at }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <a class="list-group-item" style="text-decoration:none;" href="{{ route('elections.show',$election->id ) }}">{{ $election->name }}</a>
                                        </td>
                                        <td>
                                            {{ $election->updated_at }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach  
                        </tbody>
                        <tfoot>
                            <tr>
                                <th >Elección</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>    
    </div>

    
    
         
</div>









@endsection