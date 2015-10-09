var vel_admin = function() {
    return {
        eliminar: function(texto, nombre, ruta, pk) {
            bootbox.confirm('<font size="5">Esta seguro de eliminar ' + texto + '"' + nombre + '" .</font>', function(result) {
                if (result) {
                    window.location.replace(ruta + pk);
                }
            });
        }
    }
}();

var invision_cmb = function() {
    return{
        init: function(origen, destino, ruta) {
            $(origen).change(function() {
                var valor = $(origen).val();
                var resultado = $(destino).empty();
                var vacio = true;
                $.get(ruta, {pk: valor}, function(response) {
                    $.each(response, function(item) {
                        $(destino).append('<option value="' + this.id + '">' + this.nombre + '</option>');
                    });
                }, 'json');
            });
        },
    }
}();

var invision_modal_ruta = function() {
    return{
        mostrar: function(ruta) {
            $.get(ruta, function(response) {
                bootbox.confirm(response, function(result) {
                    if (result) {
                        $.post(ruta + '&'
                                + $('#form input, textarea, select').serialize()
                                , function(respuesta) {
                                    $.each(respuesta, function(item) {
                                        window.location.replace(this.ruta);
                                    });
                                }, 'json');
                    }
                });
            });
        }
    }
}();

$(document).ready(function() {
    jQuery('.no-print').css('display', 'none');
    jQuery('.actions').html('Acciones');
    jQuery('.vel_cmb').change(function() {
        var ruta = $(this).attr('ruta');
        var destino = $(this).attr('destino');
        var valor = $(this).val();
        if (valor != '') {
            $.get(ruta, {pk: valor}, function(response) {
                $(destino).empty();
                $(response).each(function(index, val) {
                    $(destino).append(new Option(val.nombre, val.id));
                });
            }, 'json');
        }
    });
});

