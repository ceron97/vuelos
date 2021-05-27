<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarAerolineasControlador.php';
	require_once '../modelo/gestionarAerolineasModelo.php';

	class AjaxGestionarAerolineas
	{
		
		public $idAerolinea;

		//muestra al usuario que se solicito
		public function ajaxEditarAerolinea(){

			$item = 'id';
			$valor = $this->idAerolinea;

			$respuesta = gestionarAerolineasControlador::ctrMostrarAerolineas($item, $valor);

			echo json_encode($respuesta);

		}

		public $validarCodigo;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxValidarCodigo(){

			$item = 'codigo';

			$valor = $this->validarCodigo;

			$respuesta = gestionarAerolineasControlador::ctrMostrarAerolineas($item, $valor);

			echo json_encode($respuesta);

		}

		public $eliminarAerolinea;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxEliminarAerolinea(){

			$item = 'id';

			$valor = $this->eliminarAerolinea;

			$respuesta = gestionarAerolineasControlador::ctrBorrarAerolinea($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idAerolinea'])) {
		
		$editar = new AjaxGestionarAerolineas();
		$editar -> idAerolinea = $_POST['idAerolinea'];
		$editar -> ajaxEditarAerolinea();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['validarCodigo'])) {
		
		$valUsuario = new AjaxGestionarAerolineas();
		$valUsuario -> validarCodigo = $_POST['validarCodigo'];
		$valUsuario -> ajaxValidarCodigo();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['eliminarAerolinea'])) {

		$valUsuario = new AjaxGestionarAerolineas();
		$valUsuario -> eliminarAerolinea = $_POST['eliminarAerolinea'];
		$valUsuario -> ajaxEliminarAerolinea();

	}
