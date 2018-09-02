@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-12">
    <h3 class="page-header" style="margin-top: 0%">Elecciónes</h3>
    @if(\Session::has('message'))
        @include('layouts.message')
    @endif
    
    <a class="btn btn-primary block" href="{{ route('home') }}">Atras</a><br><br>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Elecciones</div>
                <div class="panel-body">

                    <table id="consortium" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Elección</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($elections as $election)
                             <tr>
                                <td>
                                    <a class="list-group-item" style="text-decoration:none;" href="{{ route('votes.show',$election->id ) }}">{{ $election->name }}</a>
                                </td>
                                <td>
                                    {{ $election->updated_at }}
                                </td>
                             </tr>
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