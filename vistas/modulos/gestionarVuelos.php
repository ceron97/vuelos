<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Vuelos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" 
                            type="button" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalAgregarVuelos"
                        >
                    Agregar vuelo
                </button>
            </div>
                
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Costo pasaje</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Avion</th>
                            <th>Piloto</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Puestos disponibles</th>
                            <th>Acciones</th>
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

                            //llama al controlador que muestra a los vuelos y con un foreach 
                            //rellena todos los campos de la tabla
                            $vuelos = gestionarVuelosControlador::ctrMostrarVuelos($item, $valor);

                            foreach ($vuelos as $key => $value) {
                                
                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td codigo="'.$value["codigo"].'">'.$value["codigo"].'</td>
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
                                                <button class="btn btn-warning btnEditarVuelos" 
                                                            type="button" 
                                                            idVuelo="'.$value["id"].'" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalEditarVuelos"
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btnEliminarVuelos" 
                                                            type="button" 
                                                            idVuelo="'.$value["id"].' 
                                                            codigo="'.$value["codigo"].'"
                                                        >
                                                    <i class="fas fa-times"></i>
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


<!-- Modal -->
<div class="modal fade" id="modalAgregarVuelos" tabindex="-1" aria-labelledby="modalAgregarVuelosLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarVuelos/crearVuelos.php";
	?>
</div>



<!--    odal -->
<div class="modal fade" id="modalEditarVuelos" tabindex="-1" aria-labelledby="modalEditarVuelosLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarVuelos/editarVuelos.php";
	?>
</div>