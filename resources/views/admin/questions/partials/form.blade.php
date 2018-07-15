<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
      {!! Form::label('question', 'Pregunta') !!}
      {!! Form::text('question', null, ['class' => 'form-control','placeholder' => 'Ingrese la pregunta?'])!!}
    </div>
  </div>

</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-primary btn-sm pull-right">
      <span class="glyphicon glyphicon-ok"></span> Guardar 
    </button>
        
    <button type="reset" class="btn btn-danger btn-sm pull-right">
      <span class="glyphicon glyphicon-remove"></span> Cancelar 
    </button>

    <a class="btn btn-default btn-sm pull-left" href="{{ route('questions.index') }}">atras</a><br><br>
</div>

