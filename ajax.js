$(document).ready(function () {
    $("body").on("click", ".btnEnviar", function (e) {
        e.preventDefault();
        $.get("ajax.php", { id: 23, nombre: "thaylor" }, function (result) {
            if (result.data.length) {
                $(".data").empty();
                for (const key in result.data) {
                    $(".data").append(`
                        <tr>
                            <td>${result.data[key].titulo}</td>
                            <td>${result.data[key].texto}</td>
                            <td>
                                <a href="#" class="btnEliminar" data-id="${result.data[key].id}" data-titulo="${result.data[key].titulo}">Eliminar</a>
                                <a href="#" class="btnActualizar" data-id="${result.data[key].id}">Actualizar</a>
                            </td>
                        </tr>
                    `);
                }
            } else {
                alert("no encontre datos para mostrar")
            }
        }, "json");
    });
    $("#form1").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "mas.php",
            data:$(this).serialize(),
            dataType :"json",
            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * funcion para mostrar loader
                * */
            },
            success: function(result){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * ocultar loader
                * */
               $(this)[0].reset();
                
            }
        });
    })
    $("body").on("click", ".btnEliminar", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        console.log(id)
    });

    $("body").on("click", ".btnActualizar", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.post("mas.php", { id }, function (result) {

        }, "json");
    });
});