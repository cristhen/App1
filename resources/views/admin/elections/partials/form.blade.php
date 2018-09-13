<div class="row">
  
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
      {!! Form::label('Consorcio', 'Consorcio') !!}
        @if(Auth::user()->is_master)
            {!! Form::select('consortiums_id', $consortiums, null, ['class' => 'form-control'])!!}
        @elseif( Auth::user()->is_admin)
        <select name="consortiums_id" class="form-control">
            <option value="{{ Auth::user()->consortiums_id  }}">{{ Auth::user()->consortiums->name  }}</option>
        </select>
        @endif
    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
      {!! Form::label('name', 'Nombre de la eleccion') !!}
      {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ej: Eleccion condominio'])!!}
      <span class="help-block">Slogan de la elección.</span> 
    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
      {!! Form::label('description', 'Descripcion') !!}
      {!! Form::text('description', null, ['class' => 'form-control','placeholder' => 'Descripcion de la elección'])!!}
      <span class="help-block">Breve explicacion de porque la elección.</span> 
    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
      {!! Form::label('amount', 'Monto') !!}
      {!! Form::text('amount', null, ['class' => 'form-control','placeholder' => 'Capital disponible'])!!}
      <span class="help-block">Capital disponible.</span> 
    </div>
  </div>

 <div class="col-lg-12 col-md-12 col-sm-12">
    <table id="tabla" class="table table-bordered table-hover">
      <tr>
          <td>Preguntas</td>
          <td><button class="btn btn-info btn-xs pull-right" id="btnNew" type="button"><strong>+</strong></button></td>
      </tr>
      <tr>
          <td>
              <input class="form-control" type="text" name="question[]" placeholder="Ingrese la pregunta ¿?" autocomplete="off">
          </td>
          <td width="10px"></td>
      </tr>
    </table>
  </div>


</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-primary btn-sm pull-right">
      <span class="glyphicon glyphicon-ok"></span> Guardar 
    </button>
        
    <button type="reset" class="btn btn-danger btn-sm pull-right">
      <span class="glyphicon glyphicon-remove"></span> Cancelar 
    </button>
    
    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> Cerrar 
    </button><br><br>
</div>

