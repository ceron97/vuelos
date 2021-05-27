<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarVuelosControlador.php';
	require_once '../modelo/gestionarVuelosModelo.php';

	class AjaxGestionarVuelos
	{
		
		public $idVuelo;

		//muestra al usuario que se solicito
		public function ajaxEditarVuelo(){

			$item = 'id';
			$valor = $this->idVuelo;

			$respuesta = gestionarVuelosControlador::ctrMostrarVuelos($item, $valor);

			echo json_encode($respuesta);

		}

		public $validarCodigo;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxValidarCodigo(){

			$item = 'codigo';

			$valor = $this->validarCodigo;

			$respuesta = gestionarVuelosControlador::ctrMostrarVuelos($item, $valor);

			echo json_encode($respuesta);

		}

		public $eliminarVuelo;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxEliminarVuelo(){

			$item = 'id';

			$valor = $this->eliminarVuelo;

			$respuesta = gestionarVuelosControlador::ctrBorrarVuelo($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idVuelo'])) {
		
		$editar = new AjaxGestionarVuelos();
		$editar -> idVuelo = $_POST['idVuelo'];
		$editar -> ajaxEditarVuelo();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['validarCodigo'])) {
		
		$valUsuario = new AjaxGestionarVuelos();
		$valUsuario -> validarCodigo = $_POST['validarCodigo'];
		$valUsuario -> ajaxValidarCodigo();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['eliminarVuelo'])) {

		$valUsuario = new AjaxGestionarVuelos();
		$valUsuario -> eliminarVuelo = $_POST['eliminarVuelo'];
		$valUsuario -> ajaxEliminarVuelo();

	}
