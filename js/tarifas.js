$(function(){
    $(".button_editar_tarifa").click(function(e){
        $(".editar_tarifas").show("slow");
        $.ajax({
            url: "?action=tarifaById",
            method: "POST",
            data: {tar_id: e.target.id},
            dataType: "json",
            success: function (r) {
                $("#tar_id").val(r.data.tar_id);
                $("#tar_valor_minuto").val(r.data.tar_valor_minuto);
                $("#tar_valor_hora").val(r.data.tar_valor_hora);
                $("#tar_hora_minima").val(r.data.tar_hora_minima);
                $("#tar_valor_minima").val(r.data.tar_valor_minima);
                $("#tar_hora_maxima").val(r.data.tar_hora_maxima);
                $("#tar_valor_maxima").val(r.data.tar_valor_maxima);
                $("#tar_valor_dia").val(r.data.tar_valor_dia);
                $("#tar_valor_quincena").val(r.data.tar_valor_quincena);
                $("#tar_valor_mes").val(r.data.tar_valor_mes);
                console.log(r);
            },error: function (e) {
                console.log(e);
            }
        });
    });
    
    $(".exit").click(function(){
        $(".background_rgba").hide("slow");
    });
    
    $("#update_tarifa").click(function(){
        $("#form_update_tarifa").submit();
    });
});