@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Editar Usuario: {{$user->name}}</div>
                @if (count($errors) > 0)
                        @include('layouts.errors')
                    @endif
                <div class="panel-body">
                    <div class="col-sm-7 col-sm-offset-5">
                        <img src="{{asset('img/user/'.$user->avatar)}}" alt="{{ $user->name}}" class="img-thumbnail" width="100px"><br><br>    
                    </div>
                    
                    {!! Form::model($user,['route'=>['users.update',$user],'files' => 'true']) !!}
                        @method('patch')
                        {!! Form::token() !!}
                        <div class="row">

                          
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('nombre', 'Nombre del usuario') !!}
                              {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del usuario'])!!}
                            </div>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('email', 'Email') !!}
                              {!! Form::email('email', null, ['class' => 'form-control','disabled'])!!}
                            </div>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('Password', 'Contraseña') !!}
                              {!! Form::password('password',['class' => 'form-control','placeholder' => 'Ingrese la contraseña'])!!}
                            <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña.</span>  
                            </div>
                          </div>

                          <div class="col-md-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                              {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                              <span class="help-block">Repetir la contraseña.</span>  
                            </div>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('Role', 'Role') !!}
                                @if(Auth::user()->is_master)
                                    {!! Form::select('role', ['2' => 'Usuario', '1' => 'Administrador','0' => 'Master'],null,['class' => 'form-control']) !!}
                                @elseif(Auth::user()->is_admin)
                                    {!! Form::select('role', ['2' => 'Usuario', '1' => 'Administrador'],null,['class' => 'form-control']) !!}
                                @elseif(Auth::user()->is_user)
                                    {!! Form::select('role', ['2' => 'Usuario'],null,['class' => 'form-control']) !!}
                                @endif
                            </div>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              {!! Form::label('Consorcio', 'Consorcio') !!}
                              @if(Auth::user()->is_master)
                                {!! Form::select('consortiums_id', $consortiums, null, ['class' => 'form-control'])!!}
                              @else
                              <select name="consortiums_id" class="form-control">
                                  <option value="{{ Auth::user()->consortiums_id }}">{{ Auth::user()->consortiums->name }}</option>
                              </select>
                              @endif
                            </div>
                          </div>

                            
                            @if(Auth::user()->is_master || Auth::user()->is_admin)   
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group files">
                                    <label for="">Subir imagen</label>
                                    <input type="file" name="avatar" class="form-control">
                                    <span class="help-block">Si no quiere subir una imagen dejar en blanco.</span>  
                                  </div>
                                </div>
                            
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">

                                    {!! Form::label('uf', 'UF Numero') !!}
                                    {!! Form::text('uf_number', null, ['class' => 'form-control'])!!}

                                    @if(Auth::user()->is_user)
                                      <input type="hidden" name="uf_number" value="{{ Auth::user()->uf_number }} ">
                                    @endif

                                  </div>
                                </div>
                            @else
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <div class="form-group files">
                                    <label for="">Subir imagen</label>
                                    <input type="file" name="avatar" class="form-control">
                                    <span class="help-block">Si no quiere subir una imagen dejar en blanco.</span>  
                                  </div>
                                </div>
                            
                                <input type="hidden" name="uf_number" value="{{ Auth::user()->uf_number }} ">
                            @endif
                        </div>
                        <div class="panel-footer">
                            @if(Auth::user()->is_master || Auth::user()->is_admin)
                                <a class="btn btn-default btn-sm pull-left" href="{{ route('users.index') }}">Atras</a>
                                <button type="submit" class="btn btn-primary btn-sm pull-right">
                                    <span class="glyphicon glyphicon-ok"></span> Guardar 
                                </button><br><br>
                            @else
                                <a class="btn btn-default btn-sm pull-left" href="{{ route('home') }}">Atras</a>
                                <button type="submit" class="btn btn-primary btn-sm pull-right">
                                    <span class="glyphicon glyphicon-ok"></span> Guardar 
                                </button><br><br>
                            @endif
                            
                        </div>
                      
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
