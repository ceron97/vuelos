<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Editar datos</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="form-group mb-2">
                    <label for="nombresEdit" class="text-info">Nombres:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="nombresEdit" 
                            placeholder="Nombres" 
                            name="regNombresEdit" 
                            required
                        >
                </div>

                <div class="form-group mb-2">
                    <label for="UsuarioEdit" class="text-info">Usuario:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="UsuarioEdit" 
                            placeholder="Usuario" 
                            name="regUsuarioEdit" 
                            required
                            readonly
                        >
                </div>

                <div class="form-group  mb-2">
                    <label for="selectRolEdit" class="text-info">Rol:</label><br>
                    <select class="form-select" name="regRolEdit" id="selectRolEdit">
                        <?php 

                            $item = null;
                            $valor = null;

                            $rol = gestionarUsuariosControlador::ctrMostrarRoles($item, $valor);
                            //llama al controlador de mostrar los roles de usuario para
                            //presentarlos en un option
                            foreach ($rol as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombre"].'
                                    </option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group my-2 mb-2">
                    <input type="hidden" id="passwordActual" name="passwordActual">
                    <label for="passwordEdit" class="text-info">Contraseña:</label><br>
                    <input type="password" 
                            class="form-control password" 
                            id="passwordEdit" 
                            placeholder="Contraseña" 
                            name="regPasswordEdit" 
                            oninput="onChange()" 
                        >
                </div>

                <div class="form-group my-2 mb-4">
                    <label for="confirmPasswordEdit" class="text-info">Confirmar contraseña:</label><br>
                    <input type="password" 
                            class="form-control confirmPassword" 
                            id="confirmPasswordEdit" 
                            placeholder="Confirmar contraseña"
                            name=" regPasswordEditConfirm" 
                            oninput="onChange()" 
                        >
                </div>
                    
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return Validate()">Guardar cambios</button>
            </div>

            <?php 

                $login = new gestionarUsuariosControlador();
                $login -> ctrEditarUsuario();

            ?> 
        </div>
    </form>
</div>