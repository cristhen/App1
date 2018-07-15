$(document).ready(function() {
    var pattern = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
    x = 46;
    $('input[type="text"][id="p1"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p1').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p1').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p2"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p2').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p2').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p3"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p3').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p3').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p4"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p4').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p4').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p5"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p5').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p5').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p6"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p6').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p6').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="p7"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_p7').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_p7').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][name="ipm"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_ipm').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
            	$('#validate_ipm').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });


    var pattern1 = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\,(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\,(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\,(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
    x1 = 44;
    $('input[type="text"][name="tcomp5"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x1 && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern1.test(this1.val())) {
            $('#validate_tcomp5').html('<span class="help-block" style="color:red">Secuencia de minutos invalidos. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf(",,") !== -1) {
                this1.val(this1.val().replace(',,', ','));
            }
            x1 = 44;
        } else {
            x1 = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == ',') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split(',');
            if (ip.length == 4) {
            	$('#validate_tcomp5').html('<span class="help-block" style="color:green">Secuencia de minutos correctos. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][name="tcomp6"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x1 && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern1.test(this1.val())) {
            $('#validate_tcomp6').html('<span class="help-block" style="color:red">Secuencia de minutos invalidos. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf(",,") !== -1) {
                this1.val(this1.val().replace(',,', ','));
            }
            x1 = 44;
        } else {
            x1 = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == ',') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split(',');
            if (ip.length == 4) {
            	$('#validate_tcomp6').html('<span class="help-block" style="color:green">Secuencia de minutos correctos. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][name="tcomp7"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x1 && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern1.test(this1.val())) {
            $('#validate_tcomp7').html('<span class="help-block" style="color:red">Secuencia de minutos invalidos. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf(",,") !== -1) {
                this1.val(this1.val().replace(',,', ','));
            }
            x1 = 44;
        } else {
            x1 = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == ',') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split(',');
            if (ip.length == 4) {
            	$('#validate_tcomp7').html('<span class="help-block" style="color:green">Secuencia de minutos correctos. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });

    $('input[type="text"][id="puerto_ip"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_puerto').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
                $('#validate_puerto').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });
});

function validateIp(){
    var pattern = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
    x = 46;
    $('input[type="text"][id="ip_edificio_puerto1"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_ip_edificio_puerto1').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
                $('#validate_ip_edificio_puerto1').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });
}

function validateIpM(){
    var pattern = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
    x = 46;
    $('input[type="text"][id="ipm1"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern.test(this1.val())) {
            $('#validate_ipm1').html('<span class="help-block" style="color:red">Ip no valida. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf("..") !== -1) {
                this1.val(this1.val().replace('..', '.'));
            }
            x = 46;
        } else {
            x = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == '.') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split('.');
            if (ip.length == 4) {
                $('#validate_ipm1').html('<span class="help-block" style="color:green">Ip valida. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });
}

function validateTcomp5(){
    $('input[type="text"][id="tcomp5_1"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x1 && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern1.test(this1.val())) {
            $('#validate_tcomp5_1').html('<span class="help-block" style="color:red">Secuencia de minutos invalidos. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf(",,") !== -1) {
                this1.val(this1.val().replace(',,', ','));
            }
            x1 = 44;
        } else {
            x1 = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == ',') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split(',');
            if (ip.length == 4) {
                $('#validate_tcomp5_1').html('<span class="help-block" style="color:green">Secuencia de minutos correctos. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });
}

function validateTcomp6(){
    $('input[type="text"][id="tcomp6_1"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != x1 && (e.which < 48 || e.which > 57)) {
            console.log(e.which);
            return false;
        }
    }).keyup(function () {
        var this1 = $(this);
        if (!pattern1.test(this1.val())) {
            $('#validate_tcomp6_1').html('<span class="help-block" style="color:red">Secuencia de minutos invalidos. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>');
            while (this1.val().indexOf(",,") !== -1) {
                this1.val(this1.val().replace(',,', ','));
            }
            x1 = 44;
        } else {
            x1 = 0;
            var lastChar = this1.val().substr(this1.val().length - 1);
            if (lastChar == ',') {
                this1.val(this1.val().slice(0, -1));
            }
            var ip = this1.val().split(',');
            if (ip.length == 4) {
                $('#validate_tcomp6_1').html('<span class="help-block" style="color:green">Secuencia de minutos correctos. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>');
            }
        }
    });
}