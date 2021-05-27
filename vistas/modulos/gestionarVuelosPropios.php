<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestionar vuelos propios</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                Gestionar vuelos propios
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
                            $vuelos = gestionarVuelosPropiosControlador::ctrMostrarVuelosPropios($item, $valor, $_SESSION["id"]);

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
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>