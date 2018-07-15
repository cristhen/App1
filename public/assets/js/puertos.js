$(document).ready(function(){
    $.ajax({
        url: '/seaport/list',
        type: 'post',
        dataType: 'json',
        success:function(data){
            data.forEach(function(port, index) {
                $('#puertos').append('<li><a href="/errors/'+port.id+'"><i class="glyphicon glyphicon-screenshot"></i> '+port.nombre+'</a></li> ');
            });
        }
    });

});