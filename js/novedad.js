$(function () {
    
    initMap();
    
    $("#enviar_contacto").click(function () {
        $("#nov_nombre").removeClass("error_data");
        $("#nov_apellido").removeClass("error_data");
        $("#nov_correo").removeClass("error_data");
        $("#nov_telefono").removeClass("error_data");
        $("#nov_asunto").removeClass("error_data");
        $("#nov_mensaje").removeClass("error_data");
        
        $enviar = true;
        $expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        if($("#nov_nombre").val() === ""){
            $("#nov_nombre").addClass("error_data");
            $enviar = false;
        }
        if($("#nov_apellido").val() === ""){
            $("#nov_apellido").addClass("error_data");
            $enviar = false;
        }
        if($("#nov_correo").val() === "" || !$expr.test($("#nov_correo").val())){
            $("#nov_correo").addClass("error_data");
            $enviar = false;
        }
        if($("#nov_telefono").val() === ""){
            $("#nov_telefono").addClass("error_data");
            $enviar = false;
        }
        if($("#nov_asunto").val() === null){
            $("#nov_asunto").addClass("error_data");
            $enviar = false;
        }
        if($("#nov_mensaje").val() === ""){
            $("#nov_mensaje").addClass("error_data");
            $enviar = false;
        }
        
        if($enviar){
            $("#form_novedad").submit();
        }
    });
});

var map;
var market;

function initMap() {
    // Create a map object and specify the DOM element for display.
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 2.441250, lng: -76.602858},
        zoom: 16
    });

    market = new google.maps.Marker({
        position: map.getCenter(),
        map: map
    });

    google.maps.event.addListener(market, 'click', function () {
        var infowindow = new google.maps.InfoWindow({
            content: '<p> IPPARKING: ' + market.getPosition() + '</p>'
        });

        infowindow.open(map, market);
    });
}


