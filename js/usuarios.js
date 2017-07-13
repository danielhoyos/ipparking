// DATOS PERFIL 

$usuario_correcto = true;
$correo_correcto = true;
$usuario = "";
$correo = "";
$expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

$(function () {
    $("#usu_avatar").change(function () {
        $("#avatar").addClass("oculto");
        var formData = new FormData(document.getElementById("editarAvatar"));
        $.ajax({
            url: "?action=update_avatar",
            method: "POST",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                location.reload();
            }
        });
    });

    $("#usu_portada").change(function () {
        $("#editarPortada").submit();
    });

    $("#button_editar").click(function () {
        $("#button_editar").addClass("button_oculto");
        $("#botton_guardar").removeClass("button_oculto");
        $("#botton_cancelar").removeClass("button_oculto");

        $("#per_nombre").prop("disabled", false);
        $("#per_nombre").addClass("edit_data");

        $("#per_apellido").prop("disabled", false);
        $("#per_apellido").addClass("edit_data");

        $("#per_fecha_nacimiento").prop("disabled", false);
        $("#per_fecha_nacimiento").addClass("edit_data");

        $(".per_genero").prop("disabled", false);

        $("#per_direccion").prop("disabled", false);
        $("#per_direccion").addClass("edit_data");

        $("#per_telefono").prop("disabled", false);
        $("#per_telefono").addClass("edit_data");

        $("#per_correo").prop("disabled", false);
        $("#per_correo").addClass("edit_data");

        $("#usu_usuario").prop("disabled", false);
        $("#usu_usuario").addClass("edit_data");

        $usuario = $("#usu_usuario").val();
        $correo = $("#per_correo").val();
    });

    $("#botton_cancelar").click(function () {
        $("#button_editar").removeClass("button_oculto");
        $("#botton_guardar").addClass("button_oculto");
        $("#botton_cancelar").addClass("button_oculto");

        $("#per_nombre").prop("disabled", true);
        $("#per_nombre").removeClass("edit_data");

        $("#per_apellido").prop("disabled", true);
        $("#per_apellido").removeClass("edit_data");

        $("#per_fecha_nacimiento").prop("disabled", true);
        $("#per_fecha_nacimiento").removeClass("edit_data");

        $("#per_direccion").prop("disabled", true);
        $("#per_direccion").removeClass("edit_data");

        $("#per_telefono").prop("disabled", true);
        $("#per_telefono").removeClass("edit_data");

        $("#per_correo").prop("disabled", true);
        $("#per_correo").removeClass("edit_data");

        $("#usu_usuario").prop("disabled", true);
        $("#usu_usuario").removeClass("edit_data");
    });

    $("#botton_guardar").click(function () {
        $("#per_nombre").removeClass("error_data");
        $("#per_apellido").removeClass("error_data");
        $("#per_direccion").removeClass("error_data");
        $("#per_telefono").removeClass("error_data");
        $("#per_correo").removeClass("error_data");
        $("#usu_usuario").removeClass("error_data");

        $correcto = true;

        if ($("#per_nombre").val() === "") {
            $("#per_nombre").addClass("error_data");
            $correcto = false;
        }
        if ($("#per_apellido").val() === "") {
            $("#per_apellido").addClass("error_data");
            $correcto = false;
        }
        if ($("#per_fecha_nacimiento").val() === "") {
            $("#per_fecha_nacimiento").addClass("error_data");
            $correcto = false;
        }
        if ($("#per_direccion").val() === "") {
            $("#per_direccion").addClass("error_data");
            $correcto = false;
        }
        if ($("#per_telefono").val() === "") {
            $("#per_telefono").addClass("error_data");
            $correcto = false;
        }
        if ($("#per_correo").val() === "") {
            $("#per_correo").addClass("error_data");
            $correcto = false;
        }
        if ($("#usu_usuario").val() === "") {
            $("#usu_usuario").addClass("error_data");
            $correcto = false;
        }
        if (!$correo_correcto) {
            $("#per_correo").addClass("error_data");
        }

        if (!$usuario_correcto) {
            $("#usu_usuario").addClass("error_data");
        }

        if ($correcto === true && $usuario_correcto === true && $correo_correcto === true) {
            $("#form_update_user").submit();
        }
    });

    $("#usu_usuario").change(function () {
        $("#usu_usuario").removeClass("error_data");
        $("#usu_usuario").removeClass("correct_data");
        $("#usuario_ajax").removeClass("error");
        $("#usuario_ajax").removeClass("correct");

        if ($("#usu_usuario").val() === $usuario) {
            $usuario_correcto = true;
            $("#usuario_ajax").html("");
        } else if ($("#usu_usuario").val() === "") {
            $usuario_correcto = false;
            $("#usu_usuario").addClass("error_data");
            $("#usuario_ajax").html("Este campo no puede estar vacio");
            $("#usuario_ajax").addClass("error");
        } else {
            $("#usuario_ajax").html("");
            $("#loading_usuario").removeClass("oculto");
            var obj = new Object();
            obj.usu_usuario = $("#usu_usuario").val();

            $.ajax({
                url: "?action=search_user",
                method: "POST",
                data: obj,
                dataType: "json",
                success: function (r) {
                    $("#loading_usuario").addClass("oculto");
                    if (r.status === 200) {
                        $("#usu_usuario").addClass("error_data");
                        $("#usuario_ajax").addClass("error");
                        $usuario_correcto = false;
                    } else if (r.status === 201) {
                        $("#usu_usuario").addClass("correct_data");
                        $("#usuario_ajax").addClass("correct");
                        $usuario_correcto = true;
                    }

                    $("#usuario_ajax").html(r.msg);
                },
                error: function (e, f) {
                }
            });
        }
    });

    $("#per_correo").change(function () {
        $("#per_correo").removeClass("error_data");
        $("#per_correo").removeClass("correct_data");
        $("#correo_ajax").removeClass("error");
        $("#correo_ajax").removeClass("correct");

        if ($("#per_correo").val() === $correo) {
            $correo_correcto = true;
            $("#correo_ajax").html("");
        } else if ($("#per_correo").val() === "") {
            $correo_correcto = false;
            $("#per_correo").addClass("error_data");
            $("#correo_ajax").html("Este campo no puede estar vacio");
            $("#correo_ajax").addClass("error");
        } else if (!$expr.test($("#per_correo").val())) {
            $correo_correcto = false;
            $("#per_correo").addClass("error_data");
            $("#correo_ajax").html("No es un correo valido");
            $("#correo_ajax").addClass("error");
        } else {
            $("#correo_ajax").html("");
            $("#loading_correo").removeClass("oculto");
            var obj = new Object();
            obj.per_correo = $("#per_correo").val();

            $.ajax({
                url: "?action=search_email",
                method: "POST",
                data: obj,
                dataType: "json",
                success: function (r) {
                    $("#loading_correo").addClass("oculto");
                    if (r.status === 200) {
                        $("#per_correo").addClass("error_data");
                        $("#correo_ajax").addClass("error");
                        $correo_correcto = false;
                    } else if (r.status === 201) {
                        $("#per_correo").addClass("correct_data");
                        $("#correo_ajax").addClass("correct");
                        $correo_correcto = true;
                    }

                    $("#correo_ajax").html(r.msg);
                },
                error: function (e, f) {
                }
            });
        }
    });

    // FIN DATOS PERFIL

    // DATOS PASSWORD

    $("#usu_password").change(function () {
        $("#usu_password_new").prop("disabled", true);
        $("#usu_password_confirmar").prop("disabled", true);

        if ($("#usu_password").val() !== "") {
            $("#usu_password_new").prop("disabled", false);
            $("#usu_password_confirmar").prop("disabled", false);
        }
    });

    $("#usu_password_new").change(function () {
        $("#usu_password_new").removeClass("correct_data");
        $("#usu_password_new").removeClass("error_data");
        $("#usu_password_confirmar").removeClass("correct_data");
        $("#usu_password_confirmar").removeClass("error_data");

        $("#password_ajax").html("");
        $("#password_ajax").removeClass("correct");
        $("#password_ajax").removeClass("error");
        $("#botton_editar_password").prop("disabled", true);

        if ($("#usu_password_new").val().length < 8) {

            if ($("#usu_password_confirmar").val().length < 8) {
                $("#usu_password_confirmar").addClass("error_data");
            }

            $("#password_ajax").html("La contraseña debe contener minimo 8 caracteres");
            $("#password_ajax").addClass("error");
            $("#usu_password_new").addClass("error_data");
        } else {
            if (($("#usu_password_new").val() !== "" & $("#usu_password_confirmar").val() !== "")
                    & ($("#usu_password_new").val() === $("#usu_password_confirmar").val())) {
                $("#usu_password_new").addClass("correct_data");
                $("#usu_password_confirmar").addClass("correct_data");

                $("#password_ajax").html("Las contraseñas son coinciden");
                $("#botton_editar_password").prop("disabled", false);
                $("#password_ajax").addClass("correct");
                $("#password_ajax").show();

            } else {
                if ($("#usu_password_confirmar").val() !== "") {
                    $("#usu_password_new").addClass("error_data");
                    $("#usu_password_confirmar").addClass("error_data");

                    $("#password_ajax").html("Las Contraseñas No Coinciden");
                    $("#botton_editar_password").prop("disabled", true);
                    $("#password_ajax").addClass("error");
                    $("#password_ajax").show();
                }
            }
        }
    });

    $("#usu_password_confirmar").change(function () {

        $("#usu_password_new").removeClass("correct_data");
        $("#usu_password_confirmar").removeClass("correct_data");
        $("#usu_password_new").removeClass("error_data");
        $("#usu_password_confirmar").removeClass("error_data");

        $("#botton_editar_password").prop("disabled", true);
        $("#password_ajax").html("");
        $("#password_ajax").removeClass("correct");
        $("#password_ajax").removeClass("error");

        if ($("#usu_password_confirmar").val().length < 8) {

            if ($("#usu_password_new").val().length < 8) {
                $("#usu_password_new").addClass("error_data");
            }
            $("#password_ajax").html("La contraseña debe contener minimo 8 caracteres");
            $("#password_ajax").addClass("error");
            $("#usu_password_confirmar").addClass("error_data");
        } else {
            if (($("#usu_password_new").val() !== "" & $("#usu_password_confirmar").val() !== "")
                    & ($("#usu_password_confirmar").val() === $("#usu_password_new").val())) {
                $("#usu_password_new").addClass("correct_data");
                $("#usu_password_confirmar").addClass("correct_data");

                $("#botton_editar_password").prop("disabled", false);
                $("#password_ajax").html("Las Contraseñas Coinciden");
                $("#password_ajax").addClass("correct");
                $("#password_ajax").show();

            } else {
                if ($("#usu_password_new").val() !== "") {
                    $("#usu_password_new").addClass("error_data");
                    $("#usu_password_confirmar").addClass("error_data");

                    $("#botton_editar_password").prop("disabled", true);
                    $("#password_ajax").html("Las Contraseñas No Coinciden");
                    $("#password_ajax").addClass("error");
                    $("#password_ajax").show();
                }
            }
        }
    });

    $("#botton_editar_password").click(function () {
        $("#editarPassword").submit();
    });

    $("#botton_volver").click(function () {
        location.replace("?controller=Index&action=perfil");
    });

    // Validar Ocultar/Mostrar Contraseña
    var password = 0;
    var password_new = 0;
    var password_confirmar = 0;

    $("#ver_usu_password").click(function () {
        if (password === 0) {
            password = 1;
            $('#usu_password').removeAttr("type", "password");
            $('#usu_password').prop("type", "text");
            $('#ver_usu_password').addClass("ver_password_activo");

        } else {
            password = 0;
            $('#usu_password').removeAttr("type", "text");
            $('#usu_password').prop("type", "password");
            $('#ver_usu_password').removeClass("ver_password_activo");
        }
    });

    $("#ver_usu_password_new").click(function () {
        if (password_new === 0) {
            password_new = 1;
            $('#usu_password_new').removeAttr("type", "password");
            $('#usu_password_new').prop("type", "text");
            $('#ver_usu_password_new').addClass("ver_password_activo");
        } else {
            password_new = 0;
            $('#usu_password_new').removeAttr("type", "text");
            $('#usu_password_new').prop("type", "password");
            $('#ver_usu_password_new').removeClass("ver_password_activo");
        }
    });

    $("#ver_usu_password_confirmar").click(function () {
        if (password_confirmar === 0) {
            password_confirmar = 1;
            $('#usu_password_confirmar').removeAttr("type", "password");
            $('#usu_password_confirmar').prop("type", "text");
            $('#ver_usu_password_confirmar').addClass("ver_password_activo");
        } else {
            USR_PasswordConfirmar = 0;
            $('#usu_password_confirmar').removeAttr("type", "text");
            $('#usu_password_confirmar').prop("type", "password");
            $('#ver_usu_password_confirmar').removeClass("ver_password_activo");
        }
    });

    // Validar Ocultar/Mostrar Contraseña

    // FIN DATOS PASSWORD

    $("#volver_password").click(function () {
        window.location.href = "?";
    });

    $(".reload_captcha").click(function (e) {
        e.preventDefault();
        var url = $("#captcha").attr("src");
        $("#captcha").attr("src", url + "&1");
    });

    $("#valor_captcha").change(function () {
        $("#input_captcha").removeClass("error_data");
        $("#input_captcha").removeClass("correct_data");
        $("#captcha_ajax").html("");
        $("#captcha_ajax").removeClass("error");
        $("#captcha_ajax").removeClass("correcto");

        if ($("#valor_captcha").val().length < 5) {
            $("#input_captcha").addClass("error_data");
            $("#captcha_ajax").html("Captcha incompleto");
            $("#captcha_ajax").addClass("error");
        } else {
            var obj = new Object();
            obj.captcha = $("#valor_captcha").val();
            $.ajax({
                url: "?action=validateCaptcha",
                method: "POST",
                data: obj,
                dataType: "json",
                success: function (r) {
                    if (r.status === 200) {
                        $("#captcha_ajax").html("Captcha correcto");
                        $("#captcha_ajax").addClass("correct");
                        $("#input_captcha").addClass("correct_data");

                        if ($("#correo_restore").val() !== "" && $expr.test($("#correo_restore").val())) {
                            $("#enviar_password").prop("disabled", false);
                        }
                    } else {
                        $("#captcha_ajax").html("Captcha incorrecto");
                        $("#captcha_ajax").addClass("error");
                        $("#input_captcha").addClass("error_data");
                        $("#enviar_password").prop("disabled", true);
                    }
                }
            });



        }
    });

    $("#correo_restore").change(function () {
        $("#input_correo").removeClass("error_data");
        $("#restore_ajax").html("");
        $("#restore_ajax").removeClass("error");

        if ($expr.test($("#correo_restore").val())) {
            if ($("#valor_captcha").val() !== "" && $("#valor_captcha").val().length >= 5) {
                var obj = new Object();
                obj.captcha = $("#valor_captcha").val();
                $.ajax({
                    url: "?action=validateCaptcha",
                    method: "POST",
                    data: obj,
                    dataType: "json",
                    success: function (r) {
                        if (r.status === 200) {
                            $("#captcha_ajax").html("Captcha correcto");
                            $("#captcha_ajax").addClass("correct");
                            $("#input_captcha").addClass("correct_data");

                            if ($("#correo_restore").val() !== "" && $expr.test($("#correo_restore").val())) {
                                $("#enviar_password").prop("disabled", false);
                            }
                        } else {
                            $("#captcha_ajax").html("Captcha incorrecto");
                            $("#captcha_ajax").addClass("error");
                            $("#input_captcha").addClass("error_data");
                            $("#enviar_password").prop("disabled", true);
                        }
                    }
                });
            }
        } else {
            $("#input_correo").addClass("error_data");
            $("#restore_ajax").html("Email Incorrecto");
            $("#restore_ajax").addClass("error");
            $("#enviar_password").prop("disabled", true);
        }
    });

    $("#enviar_password").click(function () {
        $("#restore_password").submit();
    });
});
