$(document).ready(function(){
    $.ajax({
        url: '/seaport/list',
        type: 'post',
        dataType: 'json',
        success:function(data){
            data.forEach(function(port, index) {
                $('#destino').append('<option value="'+port.ip+'">'+port.nombre+'</option>');
            });
        }
    });
});

$(document).ready(function(){
        $('#destino').on('change', function() {
        var ip = this.value;
        formParameters(ip);
    });
});

$(document).ready(function(){
        $('#destinoServer').on('change', function() {
        var ip = this.value;
        formServerFA(ip);
    });
});

$(document).ready(function(){
    $('.selectpicker').selectpicker();
});

function formParameters(ip){
    $('#viewForm').empty();

    var form = '';
    form +='<form method="post" action="http://'+ip+'/bfor/componente2/cambiarParameters.php" class="form">';

    form +='<div class="col-md-12">';
    //form +='<a class="btn btn-info btn-sm pull-right" href="connection/parameters/'+ip+'" >Ver parameters.ini</a>';
    form +='<a class="btn btn-info btn-sm pull-right" href="http://'+ip+'/bfor/componente2/descargarParameters.php" >Ver parameters.ini</a>';

    form +='</div>';

    form += '<div class="row">';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="intervalo_transmision">Intervalo Transmision Xpert (Minutos)</label>';
                form +='<input type="number" class="form-control" name="intervalo_transmision" id="intervalo_transmision" placeholder="15" required autocomplete="off"/>';
            form +='</div>';
        form +='</div>';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="ip_edificio_puerto">IP Pc (Segun topologia de red)</label>';
                form +='<input type="text" class="form-control" name="ip_edificio_puerto" id="ip_edificio_puerto1" placeholder="xx.xx.xx.xx" onkeypress="validateIp();" required autocomplete="off"/>';
                form +='<span id="validate_ip_edificio_puerto1"></span>';
            form +='</div>';
        form +='</div>';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="puerto">Puerto Xpert</label>';
                form +='<input type="number" class="form-control" name="puerto" id="puerto" placeholder="9090" required autocomplete="off"/>';
            form +='</div>';
        form +='</div>';

    form += '</div>';

    form += '<div class="row">';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="password_xpert">Contraseña Xpert</label>';
                form +='<input type="text" class="form-control" name="password_xpert" id="password_xpert" placeholder="XPERT" required autocomplete="off"/>';
            form +='</div>';
        form +='</div>';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="tiempo_respaldo">Tiempo de respaldo (Dias)</label>';
                form +='<input type="number" class="form-control" name="tiempo_respaldo" id="tiempo_respaldo" placeholder="365" required autocomplete="off"/>';
            form +='</div>';
        form +='</div>';

        form +='<div class="col-md-4">';
            form +='<div class="form-group">';
                form +='<label for="zona_horaria">Zona Horaria</label>';
                form +='<input type="text" class="form-control" name="zona_horaria" id="zona_horaria" placeholder="America/Caracas" required autocomplete="off"/>';
            form +='</div>';
        form +='</div>';
    form +='</div>';


    form +='<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">';
    form +='<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Close';
    form +='</button>';
    form +='<input type="hidden" name="btn" value="insert">';
    form +='<button type="submit" class="btn btn-primary btn-sm pull-right">';
    form +='<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Modificar';
    form +='</button>';
    form +='</form>';

    $('#viewForm').append(form);
}

function formServerFA(ip){
    $('#viewFormServerFA').empty();
    $('#viewBtnServerFA').empty();
    var form = '';
    form +='<form method="post" action="http://'+ip+'/bfor/serverFA/cambiarConfig.php" class="form">';
        form += '<div class="row">';

            form +='<div class="col-md-6">';
                form +='<div class="form-group">';
                    form +='<label for="ipm">IP Minea (VPN)</label>';
                    form +='<input type="text" class="form-control" name="ipm" id="ipm1" onkeypress="validateIpM();" placeholder="xx.xx.xx.xx" autocomplete="off" />';
                    form +='<span id="validate_ipm1"></span>';
                form +='</div>';
            form +='</div>';

            form +='<div class="col-md-6">';
                form +='<div class="form-group">';
                    form +='<label for="zona_horaria">Zona Horaria</label>';
                    form +='<input type="text" class="form-control" name="zona_horaria" id="zona_horaria" placeholder="America/Caracas" />';
                form +='</div>';
            form +='</div>';

        form +='</div>';


        form += '<div class="row">';

            form +='<h4>Tiempo de Ejecución</h4><hr>';
            form +='<div class="col-md-6">';
                form +='<div class="form-group">';
                    form +='<label for="tcomp5">Tiempo de ejecución comp5 (minutos)</label>';
                    form +='<input type="text" class="form-control" name="tcomp5" id="tcomp5_1" onkeypress="validateTcomp5();" placeholder="00,15,30,45" />';
                    form +='<span id="validate_tcomp5_1"></span>';
                form +='</div>';
            form +='</div>';
            form +='<div class="col-md-6">';
                form +='<div class="form-group">';
                    form +='<label for="tcomp6">Tiempo de ejecución comp6 (minutos)</label>';
                    form +='<input type="text" class="form-control" name="tcomp6" id="tcomp6_1" onkeypress="validateTcomp6();" placeholder="00,15,30,45" />';
                    form +='<span id="validate_tcomp6_1"></span>';
                form +='</div>';
            form +='</div>';

        form +='</div>';

        form +='<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">';
            form +='<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Close';
        form +='</button>';
        form +='<input type="hidden" name="btn" value="insert">';
        form +='<button type="submit" class="btn btn-primary btn-sm pull-right">';
            form +='<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Modificar';
        form +='</button>';
    form +='</form>';

    $('#viewBtnServerFA').append('<a href="http://'+ip+'/bfor/serverFA/descargarConfig.php" class="btn btn-info btn-sm pull-right">Ver Config.ini</a>');
    $('#viewFormServerFA').append(form);

}




