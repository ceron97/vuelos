<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Crear usuario</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                            
                <input type="hidden" name="crearLogueado" >

                <div class="form-group mb-2">
                    <label for="nombresAdd" class="text-info">Nombres:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="nombresAdd" 
                            placeholder="Nombres" 
                            name="regNombresAdd" 
                            required
                        >
                </div>

                <div class="form-group mb-2">
                    <label for="UsuarioAdd" class="text-info">Usuario:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="UsuarioAdd" 
                            placeholder="Usuario" 
                            name="regUsuarioAdd" 
                            required
                        >
                </div>

                <div class="form-group my-2 mb-2">
                    <label for="passwordAdd" class="text-info">Contraseña:</label><br>
                    <input type="password" 
                            class="form-control password" 
                            id="passwordAdd" 
                            placeholder="Contraseña" 
                            name="regPasswordAdd" 
                            oninput="onChange()" 
                            required
                        >
                </div>

                <div class="form-group my-2 mb-4">
                    <label for="confirmPasswordAdd" class="text-info">Confirmar contraseña:</label><br>
                    <input type="password" 
                            class="form-control confirmPassword" 
                            id="confirmPasswordAdd" 
                            placeholder="Confirmar contraseña"
                            name=" regPasswordAddConfirm" 
                            oninput="onChange()" 
                            required
                        >
                </div>
        
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return Validate()">Guardar cambios</button>
            </div>

            <?php 

                $login = new gestionarUsuariosControlador();
                $login -> ctrCrearUsuario();

            ?> 
        </div>
    </form>
</div>