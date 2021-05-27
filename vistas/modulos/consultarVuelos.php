<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vuelos disponibles</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <form>
                    <div class="container px-4 py-4">
                        <div class="row">
                            <div class="col">
                                <label for="10" class="text-info">Fecha:</label><br>
                                <div class="border me-4 px-4 py-4" id="10">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="fechaInicialConsult" class="text-info">Fecha inicial:</label><br>
                                            <input type="datetime-local" 
                                                    class="form-control" 
                                                    id="fechaInicialConsult" 
                                                    name="regFechaInicialConsult" 
                                                    min="<?php echo  date('Y-m-d\TH:i'); ?>"
                                                >
                                        </div>

                                        <div class="col-6">
                                            <label for="fechaFinalConsult" class="text-info">Fecha final:</label><br>
                                            <input type="datetime-local" 
                                                    class="form-control" 
                                                    id="fechaFinalConsult" 
                                                    name="regFechaFinalConsult" 
                                                    min="<?php echo  date('Y-m-d\TH:i'); ?>"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="11" class="text-info">Ciudad:</label><br>
                                <div class="border me-4 px-4 py-4" id="11">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="selectOrigenConsult" class="text-info">Origen:</label><br>
                                            <select class="form-select" name="regOrigenConsult" id="selectOrigenConsult">
                                                <option value="" selected></option>
                                                <?php 

                                                    $item = null;
                                                    $valor = null;

                                                    $origen = consultarVuelosControlador::ctrMostrarUbicacion($item, $valor);
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

                                        <div class="col-6">
                                            <label for="selectDestinoConsult" class="text-info">Destino:</label><br>
                                            <select class="form-select" name="regDestinoConsult" id="selectDestinoConsult">
                                                <option value="" selected></option>
                                                <?php 

                                                    $item = null;
                                                    $valor = null;

                                                    $origen = consultarVuelosControlador::ctrMostrarUbicacion($item, $valor);
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary btnConsultarVuelos" data-bs-dismiss="modal">Consultar</button>
                    </div>
                </form>
            </div>
                
            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"] ?>">

            <div class="card-body">
                <table id="tablaConsultarVuelos" class="table table-striped table-bordered table-responsive tablas text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Costo pasaje</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Avion</th>
                            <th>Piloto</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Asientos disponibles</th>
                            <th>Comprar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            /*=============================================
                            =         Rellenar campos de tabla           =
                            =============================================*/	  

                            $item = null;
                            $valor = null;
                            $contador = 1;

                            //llama al controlador que muestra a los usuarios y con un foreach 
                            //rellena todos los campos de la tabla
                            $vuelos = consultarVuelosControlador::ctrMostrarVuelos($item, $valor);

                            foreach ($vuelos as $key => $value) {

                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td>'.$value["costo_pasaje"].'</td>
                                        <td>'.$value["fecha"].'</td>
                                        <td>'.$value["hora"].'</td>
                                        <td>'.$value["nombreAvion"].'</td>
                                        <td>'.$value["nombrePiloto"].'</td>
                                        <td>'.$value["nombreOrigen"].'</td>
                                        <td>'.$value["nombreDestino"].'</td>
                                        <td>'.$value["puestos_disponibles"].'</td>
                                        <td>
                                            <div id="ojo" class="btn-group">
                                                <button class="btn btn-warning btnComprarVuelo" 
                                                            type="button" 
                                                            idVuelo="'.$value["id"].'" 
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </div>        					
                                        </td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>