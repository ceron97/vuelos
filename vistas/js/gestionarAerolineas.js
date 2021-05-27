/*=============================================
=            Modal editar usuarios            =
=============================================*/
$(document).on('click', '.btnEditarAerolinea', function(){
    //Mediante ajax rellena los campos de la ventana modal que se encuentran
    //en almacenados en la base de datos para editar a un usuario
    var idAerolinea = $(this).attr('idAerolinea');
    
    var datos = new FormData();
    datos.append('idAerolinea', idAerolinea);
    
    $.ajax({

        url:'ajax/gestionarAerolineas.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            $('#idFrabricante').val(respuesta['id']);
            $('#nombreEdit').val(respuesta['nombre']);
            $('#codigoEdit').val(respuesta['codigo']);
            $('#selectPilotoEdit').val(respuesta['id_piloto']);

        },
        error: function(respuesta){

            console.log('No se ha podido optener la informacion: ', respuesta);
        }
    })

});


/*=============================================
=             Usuario existente               =
=============================================*/
$('#codigoAdd').change(function() {
    //comprueba si el nombre de usuario que se esta ingresando en la base de
    //datos ya existe, si este es el caso genera una alerta y borra el usuario
    $('.alert').remove();
    
    var usuario = $(this).val();

    var datos = new FormData();
    datos.append('validarCodigo', usuario);

    $.ajax({

        url:'ajax/gestionarAerolineas.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            if (respuesta) {

                $('#codigoAdd').parent().after('<div class="alert alert-warning">Este codigo ya existe en la base de datos</div>');
                
                $('#codigoAdd').val("");

            }

        },
        error: function(){
            console.log('No se ha podido optener la informacion');
        }
    })
});


/*=============================================
=              Eliminar usuario               =
=============================================*/
$(document).on('click', '.btnEliminarAerolinea', function(){
    //Genera una ventana emergente para borrar a un usuario y al confirmarlo
    //borra al usuario de la base de datos
    
    swal.fire({

        title: "¿Está seguro de borrar la Aerolinea?"
        , text: "¡Si no lo está puede cancelar la acción!"
        , type: "warning"
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#dd3333'
        , cancelButtonText: "Cancelar"
        , confirmButtonText: "Si, borrar Aerolinea!"

    }).then((result)=>{

        if (result.value) {

            var Aerolinea =$(this).attr("idAerolinea");

            var datos = new FormData();
            datos.append('eliminarAerolinea', Aerolinea);

            $.ajax({

                url:'ajax/gestionarAerolineas.ajax.php',
                method: 'POST',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta){
                    
                    if (respuesta == "ok") {

                        Swal.fire({

                            type: 'success',
                            html: '<h3>¡El Aerolinea se a borrado exitosamente!</h3>',
                            confirmButtonColor: '#28a745',
                            confirmButtonText: 'Ok',
                            }).then((result)=>{

                                if(result.value){

                                    window.location = window.location;
                                }      
                            });

					}else{

                        Swal.fire({

                            type: 'error',
                            html: '<h3>Ocurrio un error, el Aerolinea no a sido borrado!</h3>',
                            confirmButtonColor: '#28a745',
                            confirmButtonText: 'Ok',
                            }).then((result)=>{

                                if(result.value){

                                    window.location = window.location;
                                }      
                            });

					}

                },
                error: function(){
                    console.log('No se ha podido optener la informacion');
                }
            })

        }

    });

});