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
      {!! Form::select('role', ['0' => 'Usuario', '1' => 'Administrador'],null,['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
      {!! Form::label('Consorcio', 'Consorcio') !!}
      {!! Form::select('consorcio_id', $consortiums, null, ['class' => 'form-control'])!!}
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
    <button type="submit" class="btn btn-primary btn-sm">
      <span class="glyphicon glyphicon-ok"></span> Guardar 
    </button>
        
    <button type="reset" class="btn btn-danger btn-sm">
      <span class="glyphicon glyphicon-remove"></span> Cancelar 
    </button>
        
    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">   Close
    </button>
</div>

