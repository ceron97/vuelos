<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestionar informacion personar</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
            Gestionar informacion personar
            </div>
                
            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"] ?>">

            <div class="card-body">
                <form class="form" action="" method="post">
                    <div class="container px-4 py-4 text-center">
                        <div class="row justify-content-center">
                            <div class="col-5">

                                <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"] ?>">
                                <input type="hidden" name="regRolEdit" id="regRolEdit">

                                <div class="mb-3">
                                <label for="nombresEditPersonal" class="text-info">Nombres:</label><br>
                                    <input type="text" 
                                            class="form-control" 
                                            id="nombresEditPersonal" 
                                            placeholder="Nombres" 
                                            name="regNombresEdit" 
                                            required
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="UsuarioEditPersonal" class="text-info">Usuario:</label><br>
                                    <input type="text" 
                                        class="form-control" 
                                        id="UsuarioEditPersonal" 
                                        placeholder="Usuario" 
                                        name="regUsuarioEdit" 
                                        required
                                        readonly
                                    >
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" id="passwordActualPersonal" name="passwordActual">
                                    <label for="passwordEditPersonal" class="text-info">Contraseña:</label><br>
                                    <input type="password" 
                                            class="form-control password" 
                                            id="passwordEditPersonal" 
                                            placeholder="Contraseña" 
                                            name="regPasswordEdit" 
                                            oninput="onChange()" 
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPasswordEditPersonal" class="text-info">Confirmar contraseña:</label><br>
                                    <input type="password" 
                                            class="form-control confirmPassword" 
                                            id="confirmPasswordEditPersonal" 
                                            placeholder="Confirmar contraseña"
                                            name=" regPasswordEditConfirm" 
                                            oninput="onChange()" 
                                        >
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary" onclick="return Validate()">Submit</button>
                                </div>
                                    <?php 

                                        $editInformacionPersonal = new gestionarInformacionPersonalControlador();
                                        $editInformacionPersonal -> ctrEditarUsuario();

                                    ?> 
                            </div>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </section>
</div>