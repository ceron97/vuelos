<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarFabricantesControlador.php';
	require_once '../modelo/gestionarFabricantesModelo.php';

	class AjaxGestionarFabricantes
	{
		
		public $idFabricante;

		//muestra al usuario que se solicito
		public function ajaxEditarFabricante(){

			$item = 'id';
			$valor = $this->idFabricante;

			$respuesta = gestionarFabricantesControlador::ctrMostrarFabricantes($item, $valor);

			echo json_encode($respuesta);

		}

		public $validarCodigo;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxValidarCodigo(){

			$item = 'codigo';

			$valor = $this->validarCodigo;

			$respuesta = gestionarFabricantesControlador::ctrMostrarFabricantes($item, $valor);

			echo json_encode($respuesta);

		}

		public $eliminarFabricante;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxEliminarFabricante(){

			$item = 'id';

			$valor = $this->eliminarFabricante;

			$respuesta = gestionarFabricantesControlador::ctrBorrarFabricante($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idFabricante'])) {
		
		$editar = new AjaxGestionarFabricantes();
		$editar -> idFabricante = $_POST['idFabricante'];
		$editar -> ajaxEditarFabricante();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['validarCodigo'])) {
		
		$valUsuario = new AjaxGestionarFabricantes();
		$valUsuario -> validarCodigo = $_POST['validarCodigo'];
		$valUsuario -> ajaxValidarCodigo();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['eliminarFabricante'])) {

		$valUsuario = new AjaxGestionarFabricantes();
		$valUsuario -> eliminarFabricante = $_POST['eliminarFabricante'];
		$valUsuario -> ajaxEliminarFabricante();

	}
