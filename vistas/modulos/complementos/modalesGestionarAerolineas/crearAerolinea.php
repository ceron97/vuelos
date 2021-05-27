<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Crear aerolinea</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group mb-2">
                    <label for="nombreAdd" class="text-info">Nombre:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="nombreAdd" 
                            placeholder="Nombre" 
                            name="regNombreAdd" 
                            required
                        >
                </div>

                <div class="form-group mb-2">
                    <label for="codigoAdd" class="text-info">Codigo:</label><br>
                    <input type="number" 
                            class="form-control" 
                            id="codigoAdd" 
                            placeholder="Codigo" 
                            name="regCodigoAdd" 
                            required
                        >
                </div>

                <div class="form-group  mb-2">
                    <label for="selectPilotoAdd" class="text-info">Piloto:</label><br>
                    <select class="form-select" name="regPilotoAdd" id="selectPilotoAdd" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $rol = gestionarAerolineasControlador::ctrMostrarPilotos($item, $valor);
                            //llama al controlador de mostrar los roles de usuario para
                            //presentarlos en un option
                            foreach ($rol as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombres"].'
                                    </option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>

            <?php 

                $login = new gestionarAerolineasControlador();
                $login -> ctrCrearAerolineas();

            ?> 
        </div>
    </form>
</div>