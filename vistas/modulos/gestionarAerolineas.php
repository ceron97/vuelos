<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Aerolineas</h1>
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
                            data-bs-target="#modalAgregarAerolineas"
                        >
                    Agregar Aerolineas
                </button>
            </div>
                
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Piloto</th>
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

                            //llama al controlador que muestra a los usuarios y con un foreach 
                            //rellena todos los campos de la tabla
                            $usuarios = gestionarAerolineasControlador::ctrMostrarAerolineas($item, $valor);

                            foreach ($usuarios as $key => $value) {
                                
                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td idUser="'.$value["codigo"].'">'.$value["codigo"].'</td>
                                        <td>'.$value["id_piloto"].'</td>
                                        <td>
                                            <div id="ojo" class="btn-group">
                                                <button class="btn btn-warning btnEditarAerolinea" 
                                                            type="button" 
                                                            idAerolinea="'.$value["id"].'" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalEditarAerolineas"
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btnEliminarAerolinea" 
                                                            type="button" 
                                                            idAerolinea="'.$value["id"].'"
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
<div class="modal fade" id="modalAgregarAerolineas" tabindex="-1" aria-labelledby="modalAgregarAerolineasLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarAerolineas/crearAerolinea.php";
	?>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEditarAerolineas" tabindex="-1" aria-labelledby="modalEditarAerolineasLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarAerolineas/editarAerolinea.php";
    ?>
</div>