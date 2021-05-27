<div class="fondo">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-form">
                    <div id="login-box" class="col-md-12">
                        <form id="login-register" class="form" action="" method="post">
                            <h3 class="text-center text-info">Crear una cuenta</h3>

                            <div class="form-group mb-2">
                                <label for="nombresAdd" class="text-info">Nombres:</label><br>
                                <input type="text" 
                                        class="form-control" 
                                        id="nombresAdd" 
                                        placeholder="NombresAdd" 
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

                            <div class="form-group text-center my-1">
                                <button type="submit" class="btn btn-primary btn-block" onclick="return Validate()">Registrarse</button>
                            </div>

                            <?php 

                                $login = new gestionarUsuariosControlador();
                                $login -> ctrCrearUsuario();

                            ?> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>