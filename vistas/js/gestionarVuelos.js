/*=============================================
=            Modal editar usuarios            =
=============================================*/
$(document).on('click', '.btnEditarVuelos', function(){
    //Mediante ajax rellena los campos de la ventana modal que se encuentran
    //en almacenados en la base de datos para editar a un usuario
    var idVuelo = $(this).attr('idVuelo');
    
    var datos = new FormData();
    datos.append('idVuelo', idVuelo);
    
    $.ajax({

        url:'ajax/gestionarVuelos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){

            var hora = respuesta['hora'].substring(0,5);
            
            $('#regIdVuelo').val(respuesta['id']);
            $('#codigoEdit').val(respuesta['codigo']);
            $('#costoPasajeEdit').val(respuesta['costo_pasaje']);
            $('#fechaEdit').val(respuesta['fecha'] + 'T' + hora);
            //$('#codigoEdit').val(respuesta['hora']);
            $('#selectAvionEdit').val(respuesta['id_avion']);
            $('#selectPilotoEdit').val(respuesta['id_piloto']);
            $('#selectOrigenEdit').val(respuesta['id_origen']);
            $('#selectDestinoEdit').val(respuesta['id_destino']);
            $('#regPuestosDisponibles').val(respuesta['puestos_disponibles']);
            
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

        url:'ajax/gestionarVuelos.ajax.php',
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
$(document).on('click', '.btnEliminarVuelo', function(){
    //Genera una ventana emergente para borrar a un usuario y al confirmarlo
    //borra al usuario de la base de datos
    
    swal.fire({

        title: "??Est?? seguro de borrar la Vuelo?"
        , text: "??Si no lo est?? puede cancelar la acci??n!"
        , type: "warning"
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#dd3333'
        , cancelButtonText: "Cancelar"
        , confirmButtonText: "Si, borrar Vuelo!"

    }).then((result)=>{

        if (result.value) {

            var Vuelo =$(this).attr("idVuelo");

            var datos = new FormData();
            datos.append('eliminarVuelo', Vuelo);

            $.ajax({

                url:'ajax/gestionarVuelos.ajax.php',
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
                            html: '<h3>??El Vuelo se a borrado exitosamente!</h3>',
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
                            html: '<h3>Ocurrio un error, el Vuelo no a sido borrado!</h3>',
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