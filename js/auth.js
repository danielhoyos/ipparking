$(function () {
    $("#button_ingresar_administracion").click(function (e) {
        e.preventDefault();
        var usuario = validarCampo(alfanumericos, $("#usu_usuario").val(), $(".input_login_usuario"), $("#msg_usuario"), 3, 20);
        var password = validarCampo(alfanumericosCaracteres, $("#usu_password").val(), $(".input_login_password"), null, 3, 50);
        
        if(usuario && password){
            $("#form_ingresar_administracion").submit();
        }
    });
});