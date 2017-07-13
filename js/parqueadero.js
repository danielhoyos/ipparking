$(function () {
    $("#registrar_parqueadero").click(function () {
        $(".insert_parqueadero").removeClass("oculto");
    });

    $(".exit").click(function () {
        $(".background_rgba").addClass("oculto");
    });

    $("#insert_parqueadero").click(function () {
        $("#form_registro_parqueadero").submit();
    });

    $(".item_parqueadero").click(function (e) {
        var id = e.target.id;
        var obj = new Object();
        obj.par_id = id;
        $.ajax({
            url: "?action=parqueaderoById",
            method: "POST",
            data: obj,
            dataType: "html",
            success: function (data) {
                $("#get_parqueadero").html(data);

                $(".exit").click(function () {
                    $(".background_rgba").addClass("oculto");
                });

                $("#editar_parqueadero").click(function () {
                    $("#usu_estado").prop("disabled", false);
                    $("#editar_parqueadero").addClass("oculto");
                    $("#guardar_parqueadero").removeClass("oculto");
                    $("#cancelar_parqueadero").removeClass("oculto");
                });

                $("#cancelar_parqueadero").click(function () {
                    $("#usu_estado").prop("disabled", true);
                    $("#editar_parqueadero").removeClass("oculto");
                    $("#guardar_parqueadero").addClass("oculto");
                    $("#cancelar_parqueadero").addClass("oculto");
                });

                $("#guardar_parqueadero").click(function () {
                    var obj = new Object();
                    obj.usu_id = $("#usu_id").val();
                    obj.usu_estado = $("#usu_estado").val();

                    $.ajax({
                        url: "?action=update_estado",
                        method: "POST",
                        data: obj,
                        dataType: "json",
                        success: function (r) {
                            $("#usu_estado").prop("disabled", true);
                            $("#editar_parqueadero").removeClass("oculto");
                            $("#guardar_parqueadero").addClass("oculto");
                            $("#cancelar_parqueadero").addClass("oculto");
                        }
                    });
                });
            }
        });
    });

    $("#button_editar_parqueadero").click(function(){
        $("#button_editar_parqueadero").addClass("button_oculto");
        $("#botton_guardar_parqueadero").removeClass("button_oculto");
        $("#botton_cancelar_parqueadero").removeClass("button_oculto");

        $("#par_nombre, #par_direccion, #par_telefono").prop("disabled", false);
        $("#par_nombre, #par_direccion, #par_telefono").addClass("edit_data");
    });

    $("#botton_guardar_parqueadero").click(function(){
        $("#form_update_parqueadero").submit();
    });

    $("#botton_cancelar_parqueadero").click(function(){
        $("#button_editar_parqueadero").removeClass("button_oculto");
        $("#botton_guardar_parqueadero").addClass("button_oculto");
        $("#botton_cancelar_parqueadero").addClass("button_oculto");

        $("#par_nombre, #par_direccion, #par_telefono, #par_capacidad_carros, #par_capacidad_motos, #par_capacidad_bicicletas, #par_capacidad_llaves, #par_capacidad_cascos").prop("disabled", true);
        $("#par_nombre, #par_direccion, #par_telefono, #par_capacidad_carros, #par_capacidad_motos, #par_capacidad_bicicletas, #par_capacidad_llaves, #par_capacidad_cascos").removeClass("edit_data");
    });

    $("#par_avatar").change(function(){
        $("#editarAvatarParqueadero").submit();
    });
});