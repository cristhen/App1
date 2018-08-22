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
      {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Ingrese el email del usuario'])!!}
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('Password', 'Contraseña Provicional') !!}
      {!! Form::password('password',['class' => 'form-control','placeholder' => 'Ingrese la contraseña'])!!}
    </div>
  </div>

  <div class="col-md-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
      {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('Role', 'Role') !!}
      @if(Auth::user()->is_master)
        {!! Form::select('role', ['2' => 'Usuario', '1' => 'Administrador', '0' => 'Master'],null,['class' => 'form-control']) !!}
      @elseif(Auth::user()->is_admin)
        <select name="role" class="form-control">
          <option value="2">Usuario</option>
        </select>
      @endif
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('Consorcio', 'Consorcio') !!}
      @if(Auth::user()->is_master)
        {!! Form::select('consortiums_id', $consortiums, null, ['class' => 'form-control'])!!}
      @elseif(Auth::user()->is_admin)
        <select name="consortiums_id" class="form-control">
          <option value="{{ Auth::user()->consortiums_id }}">{{ Auth::user()->consortiums->name }}</option>
        </select>
      @endif
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group files">
      <label for="">Subir imagen</label>
      <input type="file" name="avatar" class="form-control">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('uf', 'UF Numero') !!}
      {!! Form::text('uf_number', null, ['class' => 'form-control'])!!}
    </div>
  </div>

</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-primary btn-sm pull-right">
      <span class="glyphicon glyphicon-ok"></span> Guardar 
    </button>
        
    <button type="reset" class="btn btn-danger btn-sm pull-left">
      <span class="glyphicon glyphicon-remove"></span> Cancelar 
    </button><br><br>
</div>

