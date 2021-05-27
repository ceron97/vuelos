<div class="fondo">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-form">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>

                            <div class="form-group">
                                <label for="Usuario" class="text-info">Usuario:</label><br>
                                <input type="text" class="form-control" id="Usuario" placeholder="Usuario" name="ingUsuario" required>
                            </div>

                            <div class="form-group my-2 mb-3">
                                <label for="Contraseña" class="text-info">Contraseña:</label><br>
                                <input type="password" class="form-control" id="Contraseña" placeholder="Contraseña" name="ingPassword" required>
                            </div>

                            <div class="form-group text-center my-2">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </div>

                            <?php 

                                $login = new gestionarUsuariosControlador();
                                $login -> ctrIngresoUsuario();

                            ?> 

                            <div id="register-link" class="text-right text-center">
                                <a href="crearCuenta" class="text-info">Registrate aqui</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>