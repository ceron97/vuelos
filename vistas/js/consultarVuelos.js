/*=============================================
=            Modal editar usuarios            =
=============================================*/
$(document).on('click', '.btnConsultarVuelos', function(){
    var fechaInicial = document.getElementById('fechaInicialConsult').value;
    var fechaFinal = document.getElementById('fechaFinalConsult').value;
    var destino = document.getElementById('selectDestinoConsult').value;
    var origen = document.getElementById('selectOrigenConsult').value;

    $('#tablaConsultarVuelos').dataTable().fnDestroy();
	$("#tablaConsultarVuelos > tbody").html("");

    var datos = new FormData();
    datos.append('consultarVuelo', true);
    datos.append('fechaInicial', fechaInicial);
    datos.append('fechaFinal', fechaFinal);
    datos.append('destino', destino);
    datos.append('origen', origen);
    
    $.ajax({

        url:'ajax/consultarVuelos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            $.each(respuesta, function(key, value) {
                $('#tablaConsultarVuelos').append('<tr><td>'+key+'</td>'
                    + '<td>'+value.costo_pasaje+'</td>'
                    + '<td>'+value.fecha+'</td>'
                    + '<td>'+value.hora+'</td>'
                    + '<td>'+value.nombreAvion+'</td>'
                    + '<td>'+value.nombrePiloto+'</td>'
                    + '<td>'+value.nombreOrigen+'</td>'
                    + '<td>'+value.nombreDestino+'</td>'
                    + '<td>'+value.puestos_disponibles+'</td>'
                    + '<td>'
                    + '        <div id="ojo" class="btn-group">'
                    + '            <button class="btn btn-warning btnComprarVuelo" '
                    + '                        type="button" '
                    + '                        idVuelo="'+value.id+'" '
                    + '                    >'
                    + '                <i class="fas fa-pencil-alt"></i>'
                    + '            </button>'
                    + '        </div>'					
                    + '   </td></tr>');
            });


            $("#tablaConsultarVuelos").dataTable({
                //cambia todas el lenguaje de las tablas a español
                responsive: true,
                bAutoWidth: true,
                    "language": {
                
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                });

        },
        error: function(respuesta){

            console.log('No se ha podido optener la informacion: ', respuesta['responseText']);
        }
    })
});


/*=============================================
=              Eliminar usuario               =
=============================================*/
$(document).on('click', '.btnComprarVuelo', function(){
    //Genera una ventana emergente para borrar a un usuario y al confirmarlo
    //borra al usuario de la base de datos
    
    swal.fire({

        title: "¿Está seguro de comprar el boleto?"
        , text: "¡Si no lo está puede cancelar la acción!"
        , type: "warning"
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#dd3333'
        , cancelButtonText: "Cancelar"
        , confirmButtonText: "Si, comprar boleto!"

    }).then((result)=>{

        if (result.value) {

            var idVuelo =$(this).attr("idVuelo");
            var idUser = document.getElementById('idUser').value;

            var datos = new FormData();
            datos.append('comprarIdVuelo', idVuelo);
            datos.append('idUser', idUser);

            $.ajax({

                url:'ajax/consultarVuelos.ajax.php',
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
                            html: '<h3>¡Se ha comprado el puesto exitosamente!</h3>',
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
                            html: '<h3>Ocurrio un error, el puesto no puedo ser comprado!</h3>',
                            confirmButtonColor: '#28a745',
                            confirmButtonText: 'Ok',
                            }).then((result)=>{

                                if(result.value){

                                    window.location = window.location;
                                }      
                            });

					}

                },
                error: function(respuesta){
                    console.log('No se ha podido optener la informacion: ', respuesta['responseText']);
                }
            })

        }

    });

});