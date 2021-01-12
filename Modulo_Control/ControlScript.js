//Añade o remueve la class active del menu
$(document).ready(function() {
    $(".nav-element").click(function () {
        $(this).addClass("active");
        $(".nav-element").not(this).removeClass("active");
    });
});

//Funcion para mostrar imagen seleccionada con JQuery
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#Imagen_Sel')
                .attr('src', e.target.result)
                .show(100);

            $('#btn_publicar')
                .show(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//Funcion para la seleccion de estatus
function statusSelected(element_id){
    var opcion = $( '#'+element_id ).val();
    //alert(opcion);
    if(opcion == 2){
        $('#'+element_id)
            .css("color", "#82b74b");
    }else{
        $('#'+element_id)
            .css("color", "#CDA45E");
    }

}