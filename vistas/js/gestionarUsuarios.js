/*=============================================
=            Modal editar usuarios            =
=============================================*/
$(document).on('click', '.btnEditarUsuario', function(){
    //Mediante ajax rellena los campos de la ventana modal que se encuentran
    //en almacenados en la base de datos para editar a un usuario
    var idUsuario = $(this).attr('idUsuario');
    
    var datos = new FormData();
    datos.append('idUsuario', idUsuario);
    
    $.ajax({

        url:'ajax/gestionarUsuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            $('#nombresEdit').val(respuesta['nombres']);
            $('#UsuarioEdit').val(respuesta['usuario']);
            $('#passwordActual').val(respuesta['password']);
            $('#selectRolEdit').val(respuesta['id_rol']);

        },
        error: function(){

            console.log('No se ha podido optener la informacion: ');
        }
    })

});

/*=============================================
=             Usuario existente               =
=============================================*/
$('#UsuarioAdd').change(function() {
    //comprueba si el nombre de usuario que se esta ingresando en la base de
    //datos ya existe, si este es el caso genera una alerta y borra el usuario
    $('.alert').remove();
    
    var usuario = $(this).val();

    var datos = new FormData();
    datos.append('validarUsuario', usuario);

    $.ajax({

        url:'ajax/gestionarUsuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            if (respuesta) {

                $('#UsuarioAdd').parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
                
                $('#UsuarioAdd').val("");

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
$(document).on('click', '.btnEliminarUsuario', function(){
    //Genera una ventana emergente para borrar a un usuario y al confirmarlo
    //borra al usuario de la base de datos
    
    swal.fire({

        title: "¿Está seguro de borrar el usuario?"
        , text: "¡Si no lo está puede cancelar la acción!"
        , type: "warning"
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#dd3333'
        , cancelButtonText: "Cancelar"
        , confirmButtonText: "Si, borrar usuario!"

    }).then((result)=>{

        if (result.value) {

            var usuario =$(this).attr("idUsuario");

            var datos = new FormData();
            datos.append('eliminarUsuario', usuario);

            $.ajax({

                url:'ajax/gestionarUsuarios.ajax.php',
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
                            html: '<h3>¡El usuario se a borrado exitosamente!</h3>',
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
                            html: '<h3>Ocurrio un error, el usuario no a sido borrado!</h3>',
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