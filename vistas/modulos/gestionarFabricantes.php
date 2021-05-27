<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar fabricantes</h1>
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
                            data-bs-target="#modalAgregarFabricante"
                        >
                    Agregar fabricante
                </button>
            </div>
                
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
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
                            $usuarios = gestionarFabricantesControlador::ctrMostrarFabricantes($item, $valor);

                            foreach ($usuarios as $key => $value) {
                                
                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td idUser="'.$value["codigo"].'">'.$value["codigo"].'</td>
                                        <td>
                                            <div id="ojo" class="btn-group">
                                                <button class="btn btn-warning btnEditarFabricante" 
                                                            type="button" 
                                                            idFabricante="'.$value["id"].'" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalEditarFabricante"
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btnEliminarFabricante" 
                                                            type="button" 
                                                            idFabricante="'.$value["id"].'"
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
<div class="modal fade" id="modalAgregarFabricante" tabindex="-1" aria-labelledby="modalAgregarFabricanteLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarFabricantes/crearFabricante.php";
	?>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEditarFabricante" tabindex="-1" aria-labelledby="modalEditarFabricanteLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarFabricantes/editarFabricante.php";
	?>
</div>