var total_pagar = 0;
var valor = 0;
var parqueadero_id = 0;
var dias_parqueo = 0;
var horas = 0;
var minutos = 0;

$(function () {
    $(".exit").click(function () {
        $(".background_rgba").hide("slow");
        $("#cascos, #llaves").prop("checked", false);
        clearInterval(tiempo_corriendo);
        tiempo_corriendo = null;
    });

    $("#exit-factura").click(function () {
        $(".ver_factura").hide("slow");
        $(".datos_parqueo").show("slow");
    });

    $("#insert_parqueo").click(function () {
        $("#insert_parqueo").hide();
        $("#form_registro_parqueo").submit();
    });

    $("#finalizar_parqueo").click(function () {
        $("#finalizar_parqueo").hide();
        
        $.ajax({
            url: "?action=datosParqueadero",
            method: "POST",
            data: {veh_placa: $("#veh_placa_pao").val()},
            dataType: "json",
            success: function (r) {
                parqueadero_id = r.tarifas.par_id;
                $(".nom_parqueadero").html(r.parqueadero.par_nombre);
                $("#nit_parqueadero").html("Nit." + r.parqueadero.par_nit);
                $("#dir_parqueadero").html("Dir." + r.parqueadero.par_direccion);
                $("#tel_parqueadero").html("Tel." + r.parqueadero.par_telefono);
                $("#no_factura").html(r.facturas + 1);
                $("#cliente_identificacion").html($("#per_identificacion_pao").val());
                $("#cliente_nombre").html($("#per_nombre_pao").val() + " " + $("#per_apellido_pao").val());
                $("#tipo_vehiculo").html(r.vehiculo.tiv_nombre);
                $("#placa_vehiculo").html($("#veh_placa_pao").val());

                valor_total(r.tarifas);
                $("#total_pagar").html("$ " + total_pagar);
                $("#tiempo_parqueo").html("d " + dias_parqueo + " h " + horas + " m " + minutos);
                $("#vendedor_factura").html(r.vendedor.per_nombre + " " + r.vendedor.per_apellido);
                if ($("#tipo_pago").val() === "efectivo") {
                    $("#con-rec").html("RECIBIDO: ");
                    $("#contrato-recibido").html("$ " + $("#valor-contrato").val());
                    $("#cam-dias").html("CAMBIO: ");
                    $("#cambio-dias").html("$ " + ($("#valor-contrato").val() - total_pagar));
                } else {
                    $("#total_pagar").html("$ 0");
                    $("#con-rec").html("CONTRATO: ");
                    $("#contrato-recibido").html($("#valor-contrato").val());
                    $("#cam-dias").html("DIAS CONTRATO: ");
                    $("#cambio-dias").html($("#valor-contrato").val());
                }

                $.ajax({
                    url: "?action=insertFactura",
                    method: "POST",
                    data: {fac_valor: total_pagar,
                        pao_id: $("#pao_id").val(),
                        par_id: parqueadero_id,
                        factura: $("#factura").html(),
                        cliente: $("#per_identificacion_pao").val()},
                    dataType: "json",
                    success: function (r) {
                        if ($("#imprimir").prop("checked")) {
                            window.open(r.factura, '_blank');
                        }

                        $("#form_finalizar_parqueo").submit();
                    }, error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    });

    $("#veh_placa").change(function () {
        $.ajax({
            url: "?action=search_Vehiculo",
            data: {veh_placa: $("#veh_placa").val()},
            method: "POST",
            dataType: "json",
            success: function (r) {
                if (r.status === 200) {
                    $("#veh_id").val(r.data.veh_id);
                    $("#veh_color").val(r.data.veh_color);
                    $("#mar_id").val(r.data.mar_id);
                    $("#veh_color").prop("disabled", true);
                    $("#mar_id").prop("disabled", true);
                } else {
                    $("#veh_color").prop("disabled", false);
                    $("#mar_id").prop("disabled", false);
                    $("#veh_id").val("");
                }
            }
        });
    });

    $("#per_identificacion").change(function () {
        $.ajax({
            url: "?action=search_Persona",
            data: {per_identificacion: $("#per_identificacion").val()},
            method: "POST",
            dataType: "json",
            success: function (r) {
                if (r.status === 200) {
                    $("#usu_id").val(r.data.usu_id);
                    $("#per_nombre").val(r.data.per_nombre);
                    $("#per_apellido").val(r.data.per_apellido);
                    $("#per_nombre").prop("disabled", true);
                    $("#per_apellido").prop("disabled", true);
                } else {
                    $("#per_nombre").prop("disabled", false);
                    $("#per_apellido").prop("disabled", false);
                    $("#per_nombre").val("");
                    $("#per_apellido").val("");
                    $("#per_id").val("");
                }
            }
        });
    });
});

function valor_total(tarifas) {
    var fi = new Date(Date.parse($("#pao_fecha_inicio_pao").val() + "T" + $("#pao_hora_inicio_pao").val() + "-0500"));
    var anio = fi.getFullYear();
    var mes = ((fi.getMonth() + 1) < 10 ? '0' + (fi.getMonth() + 1) : (fi.getMonth() + 1));
    var dia = (fi.getDate() < 10 ? '0' + fi.getDate() : fi.getDate());
    var hora = (fi.getHours() < 10 ? '0' + fi.getHours() : fi.getHours());
    var minuto = (fi.getMinutes() < 10 ? '0' + fi.getMinutes() : fi.getMinutes());
    var segundo = (fi.getSeconds() < 10 ? '0' + fi.getSeconds() : fi.getSeconds());
    $("#fecha_entrada").html(dia + "/" + mes + "/" + anio + " " + hora + ":" + minuto + ":" + segundo);
    var f = new Date();
    var anio = f.getFullYear();
    var mes = ((f.getMonth() + 1) < 10 ? '0' + (f.getMonth() + 1) : (f.getMonth() + 1));
    var dia = (f.getDate() < 10 ? '0' + f.getDate() : f.getDate());
    var hora = (f.getHours() < 10 ? '0' + f.getHours() : f.getHours());
    var minuto = (f.getMinutes() < 10 ? '0' + f.getMinutes() : f.getMinutes());
    var segundo = (f.getSeconds() < 10 ? '0' + f.getSeconds() : f.getSeconds());
    $("#fecha_salida").html(dia + "/" + mes + "/" + anio + " " + hora + ":" + minuto + ":" + segundo);
    var tiempo_parqueo = Math.floor((f - fi) / 1000);
    horas = Math.floor(tiempo_parqueo / 3600);
    tiempo_parqueo = Math.floor(tiempo_parqueo % 3600);
    minutos = Math.floor(tiempo_parqueo / 60);
    var segundos = Math.floor(tiempo_parqueo % 60);
    var valor_horas = 0;
    var valor_minutos = 0;

    if (horas >= 24) {
        dias_parqueo = Math.floor(horas / 24);
        horas = (horas % 24);
    }

    if (horas < 12) {
        if (tarifas.tar_hora_minima !== 0) {
            if (horas >= 0 && horas < tarifas.tar_hora_minima) {
                if (minutos <= 30) {
                    valor_minutos = (tarifas.tar_valor_hora / 2);
                } else {
                    valor_minutos = (tarifas.tar_valor_hora);
                }
                valor_horas = (horas * tarifas.tar_valor_hora) + valor_minutos;
            } else {
                if (tarifas.tar_hora_maxima !== 0) {
                    if (horas >= tarifas.tar_hora_minima && horas < tarifas.tar_hora_maxima) {
                        valor_horas = tarifas.tar_valor_minima;
                    } else if (horas >= tarifas.tar_hora_maxima) {
                        valor_horas = tarifas.tar_valor_maxima;
                    }
                } else {
                    if (horas >= tarifas.tar_hora_minima && horas) {
                        valor_horas = tarifas.tar_valor_minima;
                    }
                }
            }
        } else {
            if (tarifas.tar_hora_maxima !== 0) {
                if (horas >= 0 && horas < tarifas.tar_hora_maxima) {
                    if (minutos <= 30) {
                        valor_minutos = (tarifas.tar_valor_hora / 2);
                    } else {
                        valor_minutos = (tarifas.tar_valor_hora);
                    }
                    valor_horas = (horas * tarifas.tar_valor_hora) + valor_minutos;
                } else {
                    if (horas >= tarifas.tar_hora_maxima && horas < 12) {
                        valor_horas = tarifas.tar_valor_maxima;
                    }
                }
            }
            else {
                if (minutos <= 30) {
                    valor_minutos = (tarifas.tar_valor_hora / 2);
                } else {
                    valor_minutos = (tarifas.tar_valor_hora);
                }
                valor_horas = (horas * tarifas.tar_valor_hora) + valor_minutos;
            }
        }
    } else {
        valor_horas = tarifas.tar_valor_dia;
    }

    total_pagar = (dias_parqueo * tarifas.tar_valor_dia) + (valor_horas);
    return total_pagar;
}