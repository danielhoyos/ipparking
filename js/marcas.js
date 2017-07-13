var imagen = "";

$(function () {
    $(".exit").click(function () {
        $(".background_rgba").hide("slow");
    });

    $(".editar_Marca").click(function (e) {
        $.ajax({
            url: "?action=datosMarca",
            method: "POST",
            data: {mar_id: $(this).data("id")},
            dataType: "json",
            success: function (data) {
                $("#mar_nombre_update").val(data.marca.mar_nombre);
                $("#tiv_id_update").val(data.marca.tiv_id);
                $("#mar_id_update").val(data.marca.mar_id);
                if (imagen === "") {
                    imagen = $("#mar_avatar_src").attr("src");
                }
                $("#mar_avatar_src").attr("src", imagen + data.marca.mar_avatar);
                $(".update_Marca").show("slow");
            }
        });
    });

    $("#registrar_marca").click(function () {
        $(".registrar_Marca").show("slow");
    });

    $("#insert_marca").click(function () {
        $("#form_insert_marca").submit();
    });

    $("#update_marca").click(function () {
        $("#form_update_marca").submit();
    });
});