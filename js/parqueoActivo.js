$(function () {
    $.ajax({
        url: "?action=datos_parqueo_usuario",
        data: {pao_id: $("#pao_id").val()},
        method: "POST",
        dataType: "json",
        success: function (r) {
            console.log(r);
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
                $("#valor_pago").text(valor_total(r.tarifas, r.data.pao_fecha_inicio, r.data.pao_hora_inicio));
            }, 1000);
            
            console.log(r);
        },
        error: function (e) {
            console.log(e);
        }
    });
});

function valor_total(tarifas, fecha_inicio, hora_inicio) {
    var fi = new Date(Date.parse(fecha_inicio + "T" + hora_inicio + "-0500"));
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