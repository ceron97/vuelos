<div class="modal-dialog">
    <form class="form" action="" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center text-info">Editar datos</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <input type="hidden" name="idFrabricante" id="idFrabricante">

                <div class="form-group mb-2">
                    <label for="nombreEdit" class="text-info">Nombre:</label><br>
                    <input type="text" 
                            class="form-control" 
                            id="nombreEdit" 
                            placeholder="Nombre" 
                            name="regNombreEdit" 
                            required
                        >
                </div>

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
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>

            <?php 

                $login = new gestionarFabricantesControlador();
                $login -> ctrEditarFabricante();

            ?> 
        </div>
    </form>
</div>