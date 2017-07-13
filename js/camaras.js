$(function () {
    var cantidadCamaras = $("#camaras_parqueadero .cam").size();

    if (cantidadCamaras === 1) {
        $("#camaras_parqueadero .cam").css({
            "width": "100%",
            "height": "600px"
        });
    }

    $(".exit").click(function () {
        $(".registrar_camaras, .editar_camaras").hide("slow");
    });

    $("#registrar_camara").click(function () {
        $(".registrar_camaras").show("slow");
    });

    $("#insert_camara").click(function () {
        $("#cam_nombre, #cam_ip, #cam_puerto").removeClass("error_data");

        var enviar = true;

        if ($("#cam_nombre").val() === "") {
            $("#cam_nombre").addClass("error_data");
            enviar = false;
        }

        if ($("#cam_ip").val() === "") {
            $("#cam_ip").addClass("error_data");
            enviar = false;
        }
        if ($("#cam_puerto").val() === "") {
            $("#cam_puerto").addClass("error_data");
            enviar = false;
        }

        if (enviar) {
            $("#form_insert_camara").submit();
        }
    });

    $(".edit_cam").click(function () {
        $(".ver_camara").click();
        $(".editar_camaras").show("slow");

        $.ajax({
            url: "?action=searchCamara",
            method: "POST",
            data: {cam_id: $(this).data("cam-id")},
            dataType: "json",
            success: function (r) {
                $("#update_cam_id").val(r.data.cam_id);
                $("#update_cam_nombre").val(r.data.cam_nombre);
                $("#update_cam_ip").val(r.data.cam_ip);
                $("#update_cam_puerto").val(r.data.cam_puerto);
                $("#update_cam_usuario").val(r.data.cam_usuario);
                $("#update_cam_password").val(r.data.cam_password);
            }
        });
    });

    $("#update_camara").click(function () {
        $("#update_cam_nombre, #update_cam_ip, #update_cam_puerto").removeClass("error_data");

        var enviar = true;

        if ($("#update_cam_nombre").val() === "") {
            $("#update_cam_nombre").addClass("error_data");
            enviar = false;
        }

        if ($("#update_cam_ip").val() === "") {
            $("#update_cam_ip").addClass("error_data");
            enviar = false;
        }
        if ($("#update_cam_puerto").val() === "") {
            $("#update_cam_puerto").addClass("error_data");
            enviar = false;
        }

        if (enviar) {
            $("#form_update_camara").submit();
        }
    });

    $(".expandir_cam").click(function () {
        $("#urlCamVer").attr("src", $(this).data("url-cam"));
        $(".datos_camara_ver").html($(this).data("cam-nombre"));
        $(".ver_camara").show("slow");
    });

    $(".ver_camara").click(function () {
        $(".ver_camara").hide("slow");
    });
});