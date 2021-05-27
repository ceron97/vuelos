<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Crear avion</h3>
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

                <div class="form-group mb-2">
                    <label for="cantidadPuestosAdd" class="text-info">Cantidad de puestos:</label><br>
                    <input type="number" 
                            class="form-control" 
                            id="cantidadPuestosAdd" 
                            placeholder="Cantidad de puestos" 
                            name="regCantidadPuestosAdd" 
                            required
                        >
                </div>

                <div class="form-group  mb-2">
                    <label for="selectFabricanteAdd" class="text-info">Fabricantes:</label><br>
                    <select class="form-select" name="selectFabricanteAdd" id="selectFabricanteAdd" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $fabricante = gestionarFabricantesControlador::ctrMostrarFabricantes($item, $valor);
                            //llama al controlador de mostrar los roles de usuario para
                            //presentarlos en un option
                            foreach ($fabricante as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombre"].' - '.$value["codigo"].'
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

                $login = new gestionarAvionesControlador();
                $login -> ctrCrearAviones();

            ?> 
        </div>
    </form>
</div>