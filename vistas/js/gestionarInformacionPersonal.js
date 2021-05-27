window.addEventListener("load",function() {

    var idUsuario = document.getElementById('idUser').value;

    var datos = new FormData();
    datos.append('idUsuario', idUsuario);
    
    $.ajax({

        url:'ajax/gestionarInformacionPersonal.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta){
            
            $('#nombresEditPersonal').val(respuesta['nombres']);
            $('#UsuarioEditPersonal').val(respuesta['usuario']);
            $('#passwordActualPersonal').val(respuesta['password']);
            $('#regRolEditPersonal').val(respuesta['id_rol']);

        },
        error: function(){

            console.log('No se ha podido optener la informacion: ');
        }
    })

});
