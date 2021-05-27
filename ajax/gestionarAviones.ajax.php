<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarAvionesControlador.php';
	require_once '../modelo/gestionarAvionesModelo.php';

	class AjaxGestionarAviones
	{
		
		public $idAvion;

		//muestra al usuario que se solicito
		public function ajaxEditarAvion(){

			$item = 'id';
			$valor = $this->idAvion;

			$respuesta = gestionarAvionesControlador::ctrMostrarAviones($item, $valor);

			echo json_encode($respuesta);

		}

		public $validarCodigo;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxValidarCodigo(){

			$item = 'codigo';

			$valor = $this->validarCodigo;

			$respuesta = gestionarAvionesControlador::ctrMostrarAviones($item, $valor);

			echo json_encode($respuesta);

		}

		public $eliminarAvion;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxEliminarAvion(){

			$item = 'id';

			$valor = $this->eliminarAvion;

			$respuesta = gestionarAvionesControlador::ctrBorrarAvion($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idAvion'])) {
		
		$editar = new AjaxGestionarAviones();
		$editar -> idAvion = $_POST['idAvion'];
		$editar -> ajaxEditarAvion();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['validarCodigo'])) {
		
		$valUsuario = new AjaxGestionarAviones();
		$valUsuario -> validarCodigo = $_POST['validarCodigo'];
		$valUsuario -> ajaxValidarCodigo();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['eliminarAvion'])) {

		$valUsuario = new AjaxGestionarAviones();
		$valUsuario -> eliminarAvion = $_POST['eliminarAvion'];
		$valUsuario -> ajaxEliminarAvion();

	}
