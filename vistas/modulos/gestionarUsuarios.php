<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar usuarios</h1>
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
                            data-bs-target="#modalAgregarUsuario"
                        >
                    Agregar usuario
                </button>
            </div>
                
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Perfil</th>
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
                            $usuarios = gestionarUsuariosControlador::ctrMostrarUsuarios($item, $valor);

                            foreach ($usuarios as $key => $value) {
                                
                                echo '<tr>
                                        <td>'.$contador++.'</td>
                                        <td>'.$value["nombres"].'</td>
                                        <td idUser="'.$value["usuario"].'">'.$value["usuario"].'</td>
                                        <td>'.$value["nombreRol"].'</td>
                                        <td>
                                            <div id="ojo" class="btn-group">
                                                <button class="btn btn-warning btnEditarUsuario" 
                                                            type="button" 
                                                            idUsuario="'.$value["id"].'" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalEditarUsuario"
                                                        >
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btnEliminarUsuario" 
                                                            type="button" 
                                                            idUsuario="'.$value["id"].' 
                                                            usuario="'.$value["usuario"].'"
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
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarUsuarios/crearUsuario.php";
	?>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <?php 
		include "complementos/modalesGestionarUsuarios/editarUsuario.php";
	?>
</div>