<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Editar datos</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <input type="hidden" name="regIdVuelo" id="regIdVuelo">
                <input type="hidden" name="regPuestosDisponibles" id="regPuestosDisponibles">

                <div class="form-group mb-2">
                    <label for="codigoEdit" class="text-info">Codigo:</label><br>
                    <input type="number" 
                            class="form-control" 
                            id="codigoEdit" 
                            placeholder="Codigo" 
                            name="regCodigoEdit" 
                            required
                        >
                </div>

                <div class="form-group mb-2">
                    <label for="costoPasajeEdit" class="text-info">Costo pasaje:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="costoPasajeEdit" 
                            placeholder="$50.000" 
                            name="regCostoPasajeEdit" 
                            required
                        >
                </div>

                <div class="form-group my-2 mb-2">
                    <label for="fechaEdit" class="text-info">Fecha:</label><br>
                    <input type="datetime-local" 
                            class="form-control password" 
                            id="fechaEdit" 
                            value="<?php echo  date('Y-m-d\TH:i'); ?>" 
                            name="regFechaEdit" 
                            required
                            min="<?php echo  date('Y-m-d\TH:i'); ?>"
                        >
                </div>

                <div class="form-group  mb-2">
                    <label for="selectPilotoEdit" class="text-info">Piloto:</label><br>
                    <select class="form-select" name="regPilotoEdit" id="selectPilotoEdit" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $piloto = gestionarAerolineasControlador::ctrMostrarPilotos($item, $valor);
                            //llama al controlador de mostrar los piloto de usuario para
                            //presentarlos en un option
                            foreach ($piloto as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombres"].'
                                    </option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group  mb-2">
                    <label for="selectAvionEdit" class="text-info">Avion:</label><br>
                    <select class="form-select" name="regAvionEdit" id="selectAvionEdit" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $avion = gestionarVuelosControlador::ctrMostrarAviones($item, $valor);
                            //llama al controlador de mostrar los aviones de usuario para
                            //presentarlos en un option
                            foreach ($avion as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombre"].'
                                    </option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group  mb-2">
                    <label for="selectOrigenEdit" class="text-info">Origen:</label><br>
                    <select class="form-select" name="regOrigenEdit" id="selectOrigenEdit" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $origen = gestionarVuelosControlador::ctrMostrarUbicacion($item, $valor);
                            //llama al controlador de mostrar los origen de usuario para
                            //presentarlos en un option
                            foreach ($origen as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombre"].'
                                    </option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group  mb-2">
                    <label for="selectDestinoEdit" class="text-info">Destino:</label><br>
                    <select class="form-select" name="regDestinoEdit" id="selectDestinoEdit" required>
                        <?php 

                            $item = null;
                            $valor = null;

                            $destino = gestionarVuelosControlador::ctrMostrarUbicacion($item, $valor);
                            //llama al controlador de mostrar los destino de usuario para
                            //presentarlos en un option
                            foreach ($destino as $key => $value) {

                                echo '<option value="'.$value["id"].'">
                                    '.$value["nombre"].'
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

                $login = new gestionarVuelosControlador();
                $login -> ctrEditarVuelos();

            ?> 
        </div>
    </form>
</div>