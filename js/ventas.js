$(function(){
    $(".ver_factura").click(function(e){
       window.open($(this).data("pdf"), '_blank');
    });
});