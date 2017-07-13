$(function () {
    $("#exportarContratosXML").click(function (e) {
        e.preventDefault();
        var datos = $("#datosTabla").html().toString();
        $("#tabla").val(datos);
        $("#enviarTabla").submit();
    });
});