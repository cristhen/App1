<div class="modal fade" id="delete-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Eliminar Usuario</h4>
            </div>
            <br>
            <form action="{{ route('deleteUser', $user) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
            	@csrf
            	<div class="modal-body" style="padding: 5px;">
                  	<div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12" style="padding-bottom: 10px;">
                            <label for="name">Nombre del usuario</label>
                            <input class="form-control" value="{{$user->name}}" type="text" disabled />
                        </div>

                         <div class="col-lg-6 col-md-6 col-sm-12" style="padding-bottom: 10px;">
                            <label for="consorcio">Consorcio</label>
                            <input class="form-control" value="{{$user->name}}" type="text" disabled />
                        </div>
                    </div>
                </div>  
                <div class="panel-footer" style="margin-bottom:-14px;">
                    <button type="submit" class="btn btn-danger btn-sm">
                    	<span class="glyphicon glyphicon-remove"></span> Eliminar
                    </button>
                        
                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">		Close
                    </button>
                </div>
          	</form>
        </div>
    </div>
</div>