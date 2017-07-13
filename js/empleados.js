$(function () {
    $("#registrar_empleado").click(function () {
        $(".insert_empleado").show("slow");
    });

    $(".exit").click(function () {
        $(".background_rgba").hide("slow");
    });

    $("#insert_empleado").click(function () {
        $("#form_registro_empleado").submit();
    });

    $(".item_empleado").click(function (e) {
        var id = e.target.id;
        var obj = new Object();
        obj.emp_id = id;
        $.ajax({
            url: "?action=empleadoById",
            method: "POST",
            data: obj,
            dataType: "html",
            success: function (data) {
                $("#get_empleado").html(data);

                $(".exit").click(function () {
                    $(".background_rgba").hide("slow");
                });

                $("#editar_empleado").click(function () {
                    $("#usu_estado").prop("disabled", false);
                    $("#editar_empleado").addClass("oculto");
                    $("#guardar_empleado").removeClass("oculto");
                    $("#cancelar_empleado").removeClass("oculto");
                });

                $("#cancelar_empleado").click(function () {
                    $("#usu_estado").prop("disabled", true);
                    $("#editar_empleado").removeClass("oculto");
                    $("#guardar_empleado").addClass("oculto");
                    $("#cancelar_empleado").addClass("oculto");
                });

                $("#guardar_empleado").click(function () {
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
                            $("#editar_empleado").removeClass("oculto");
                            $("#guardar_empleado").addClass("oculto");
                            $("#cancelar_empleado").addClass("oculto");
                        }
                    });
                });
            }
        });
    });

});