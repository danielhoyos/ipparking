var alfanumericos = "ABCDEFGHIJKLMNÑOPQRSTWXYZabcdefghijklmnñopqrstuvwxyz1234567890";
var alfanumericosCaracteres = "ABCDEFGHIJKLMNÑOPQRSTWXYZabcdefghijklmnñopqrstuvwxyz1234567890/\¡!¿?'*+[]{}_-.,.-@#$%&() =";
var numericos = "1234567890";
var alfabeticos = "ABCDEFGHIJKLMNÑOPQRSTWXYZabcdefghijklmnñopqrstuvwxyz";

function validarCampo(caracteres, campo, contenedorCampo, msgCampo, tamI, tamF) {
    contenedorCampo.removeClass("error_data");
    var correcto = true;

    if (msgCampo !== null) {
        msgCampo.html("");
    }

    if (campo.length < tamI || campo.length > tamF) {
        correcto = false;
        contenedorCampo.addClass("error_data");

        if (msgCampo !== null) {
            msgCampo.html("* Número de caracteres incorrectos minimo "+tamI+" maximo "+tamF);
        }

    } else {
        for (var i = 0; i < campo.length; i++) {
            if (caracteres.indexOf(campo.charAt(i), 0) === -1) {
                correcto = false;
                contenedorCampo.addClass("error_data");
                if (msgCampo !== null) {
                    msgCampo.html("* Contiene Caracteres Incorrectos. Verifique e intente nuevamente");
                }
                break;
            }
        }
    }
    
    return correcto;
}