$(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1
    });
    
    $("#button_login").click(function(e){
        e.preventDefault();
        var correct = true;
        $(".usuLogin").removeClass("error_data");
        $(".passLogin").removeClass("error_data");
        
        if($("#usu_usuario").val() === ""){
            $(".usuLogin").addClass("error_data");
            correct = false;
        }
        
        if($("#usu_password").val() === ""){
            $(".passLogin").addClass("error_data");
            correct = false;
        }
        
        if(correct){
            $("#form_login_cliente").submit();
        }
    });
});