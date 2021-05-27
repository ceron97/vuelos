<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Aviones</h1>
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
                            data-bs-target="#modalAgregarAviones"
                        >
                    Agregar Avion
                </button>
            </div>
                
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Cantidad de puestos</th>
                            <th>Fabricante</th>
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

                            //llama al controlador que muestra a los aviones y con un foreach 
                            //rellena todos los campos de la tabla
                            $aviones = gestionarAvionesControlador::ctrMostrarAviones($item, $valor);

                            foreach ($aviones as $key => $value) {
                                
                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td idUser="'.$value["codigo"].'">'.$value["codigo"].'</td>
                                        <td>'.$value["cantidad_puestos"].'</td>
                                        <td>'.$value["nombreFabricante"].'</td>
                                        <td>
                                            <div id="ojo" class="btn-group">
                                                <button class="btn btn-warning btnEditarAvion" 
                                                            type="button" 
                                                            idAvion="'.$value["id"].'" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalEditarAviones"
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btnEliminarAvion" 
                                                            type="button" 
                                                            idAvion="'.$value["id"].'"
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
<div class="modal fade" id="modalAgregarAviones" tabindex="-1" aria-labelledby="modalAgregarAvionesLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarAviones/crearAvion.php";
	?>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEditarAviones" tabindex="-1" aria-labelledby="modalEditarAvionesLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarAviones/editarAvion.php";
    ?>
</div>