var tiempo_corriendo = null;

$(function () {
    $(".estacion_big.estacion_disponible, .estacion_small.estacion_disponible, .estacion_min.estacion_disponible").click(function (e) {
        $(".registro_parqueo").show("slow");
        $("#insert_parqueo").show();
        $("#est_id").val(e.currentTarget.accessKey);
        $("#accesorios_llaves, #accesorios_cascos, #estacion_llave, .image_llave,  #estacion_casco, #estacion_casco1, .image_casco").hide();

        if ($(this).data("tipo") === 1) {
            $("#accesorios_llaves").show("slow");
        } else if ($(this).data("tipo") === 2) {
            $("#accesorios_cascos").show("slow");
        }
    });

    $("#llaves").change(function (e) {
        if ($("#llaves").prop("checked")) {
            $.ajax({
                url: "?action=buscar_Estacion_Accesorio",
                method: "POST",
                data: {est_tipo: "llave"},
                dataType: "json",
                success: function (r) {
                    $("#est_id_llave").val(r.data[0].est_id);
                    $("#estacion_llave").html(r.data[0].est_codigo);
                    $("#estacion_llave, .image_llave").show("slow");
                }
            });
        } else {
            $("#estacion_llave, .image_llave").hide("slow");
            $("#est_id_llave").val("");
        }
    });

    $("#cascos1").change(function () {
        if ($("#cascos1").prop("checked")) {
            $("#cascos2").prop("checked", false);
            $("#estacion_casco2, .c2").hide("slow");
            $("#est_id_casco2").val("");

            $.ajax({
                url: "?action=buscar_Estacion_Accesorio",
                method: "POST",
                data: {est_tipo: "casco"},
                dataType: "json",
                success: function (r) {
                    $("#est_id_casco1").val(r.data[0].est_id);
                    $("#estacion_casco1").html(r.data[0].est_codigo);

                    $("#estacion_casco1, .c1").show("slow");
                }
            });
        } else {
            $("#estacion_casco1, .c1").hide("slow");
            $("#est_id_casco1").val("");
        }
    });

    $("#cascos2").change(function () {
        if ($("#cascos2").prop("checked")) {
            $("#cascos1").prop("checked", false);

            $.ajax({
                url: "?action=buscar_Estacion_Accesorio",
                method: "POST",
                data: {est_tipo: "casco"},
                dataType: "json",
                success: function (r) {
                    $("#est_id_casco1").val(r.data[0].est_id);
                    $("#estacion_casco1").html(r.data[0].est_codigo);
                    $("#est_id_casco2").val(r.data[1].est_id);
                    $("#estacion_casco2").html(r.data[1].est_codigo);

                    $("#estacion_casco1, .c1, #estacion_casco2, .c2").show("slow");
                }
            });
        } else {
            $("#estacion_casco1, .c1, #estacion_casco2, .c2").hide("slow");
            $("#est_id_casco1").val("");
            $("#est_id_casco2").val("");
        }
    });

    $(".estacion_big.estacion_nodisponible, .estacion_small.estacion_nodisponible, .estacion_min.estacion_nodisponible").click(function (e) {
        $("#est_id_llave_dato, #est_id_casco1_dato, #est_id_casco2_dato").val("");
        $(".estacion_llave_codigo, .estacion_casco1_codigo, .estacion_casco2_codigo").html("");
        $("#estacion_llave, .image_llave, #estacion_casco1, #estacion_casco2, .c1, .c2").hide("slow");

        $(".datos_parqueo").show("slow");
        $("#finalizar_parqueo").show();
        $.ajax({
            url: "?action=datos_parqueo",
            data: {pao_id: e.currentTarget.accessKey},
            method: "POST",
            dataType: "json",
            success: function (r) {
                console.log(r);
                $("#pao_id").val(r.data.pao_id);
                $("#estacion_id").val(r.data.est_id);
                $("#veh_placa_pao").val(r.data.veh_placa);
                $("#veh_color_pao").val(r.data.veh_color);
                $("#mar_id_pao").val(r.data.mar_id);
                $("#pao_fecha_inicio_pao").val(r.data.pao_fecha_inicio);
                $("#pao_hora_inicio_pao").val(r.data.pao_hora_inicio);
                $("#per_identificacion_pao").val(r.data.per_identificacion);
                $("#per_nombre_pao").val(r.data.per_nombre);
                $("#per_apellido_pao").val(r.data.per_apellido);

                var fecha_inicio_parqueo = new Date(Date.parse(r.data.pao_fecha_inicio + "T" + r.data.pao_hora_inicio + "-0500"));
                var fecha_actual = new Date();
                var tiempo_parqueo = Math.floor((fecha_actual - fecha_inicio_parqueo) / 1000);

                var horas = Math.floor(tiempo_parqueo / 3600);
                tiempo_parqueo = Math.floor(tiempo_parqueo % 3600);
                var minutos = Math.floor(tiempo_parqueo / 60);
                var segundos = Math.floor(tiempo_parqueo % 60);

                tiempo_corriendo = setInterval(function () {
                    segundos++;
                    if (segundos >= 60) {
                        segundos = 0;
                        minutos++;
                    }
                    if (minutos >= 60) {
                        minutos = 0;
                        horas++;
                    }

                    $("#horas").text(horas < 10 ? '0' + horas : horas);
                    $("#minutos").text(minutos < 10 ? '0' + minutos : minutos);
                    $("#segundos").text(segundos < 10 ? '0' + segundos : segundos);
                    $("#valor_pago").text(valor_total(r.tarifas));
                }, 1000);

                $.ajax({
                    url: "?action=datos_accesorios",
                    data: {pao_id: r.data.pao_id},
                    method: "POST",
                    dataType: "json",
                    success: function (r) {
                        if (r.status === 200 && r.data.length > 0) {
                            if (r.data[0].est_tipo === "llave") {
                                $("#est_id_llave_dato").val(r.data[0].est_id);
                                $(".estacion_llave_codigo").html(r.data[0].est_codigo);
                                $("#estacion_llave, .image_llave").show("slow");
                            } else {
                                if (r.data[0].est_tipo === "casco") {
                                    $("#est_id_casco1_dato").val(r.data[0].est_id);
                                    $(".estacion_casco1_codigo").html(r.data[0].est_codigo);
                                    $("#estacion_casco1, .c1").show("slow");
                                }
                                if (r.data.length === 2) {
                                    if (r.data[1].est_tipo === "casco") {
                                        $("#est_id_casco2_dato").val(r.data[1].est_id);
                                        $(".estacion_casco2_codigo").html(r.data[1].est_codigo);
                                        $("#estacion_casco2, .c2").show("slow");
                                    }
                                }
                            }
                        }
                    }
                });
            },
            error: function(e){
                console.log(e);
            }
        });
    });

    $("#est_tipo").change(function () {
        $("#tiv_id").addClass("oculto");
        $("#cam_id").addClass("oculto");

        if ($("#est_tipo").val() === "vehiculo") {
            $("#tiv_id").removeClass("oculto");
            $("#cam_id").removeClass("oculto");
        }
    });

    $("#registrar_estacion").click(function (e) {
        $("#est_codigo").removeClass("error_data");
        $("#tiv_id").removeClass("error_data");
        $("#est_tipo").removeClass("error_data");

        var enviar = true;

        if ($("#est_codigo").val() === "") {
            $("#est_codigo").addClass("error_data");
            enviar = false;
        }

        if ($("#est_tipo").val() === "") {
            $("#est_tipo").addClass("error_data");
            enviar = false;
        } else if ($("#est_tipo").val() === "vehiculo") {
            if ($("#tiv_id").val() === "") {
                $("#tiv_id").addClass("error_data");
                enviar = false;
            }
        }

        if (enviar) {
            $("#form_insert_estacion").submit();
        }
    });
});