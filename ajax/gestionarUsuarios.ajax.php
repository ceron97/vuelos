<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarUsuariosControlador.php';
	require_once '../modelo/gestionarUsuariosModelo.php';

	class AjaxGestionarUsuarios
	{
		
		public $idUsuario;

		//muestra al usuario que se solicito
		public function ajaxEditarUsuario(){

			$item = 'id';
			$valor = $this->idUsuario;

			$respuesta = gestionarUsuariosControlador::ctrMostrarUsuarios($item, $valor);

			echo json_encode($respuesta);

		}

		public $validarUsuario;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxValidarUsuario(){

			$item = 'usuario';

			$valor = $this->validarUsuario;

			$respuesta = gestionarUsuariosControlador::ctrMostrarUsuarios($item, $valor);

			echo json_encode($respuesta);

		}

		public $eliminarUsuario;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxEliminarUsuario(){

			$item = 'id';

			$valor = $this->eliminarUsuario;

			$respuesta = gestionarUsuariosControlador::ctrBorrarUsuario($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idUsuario'])) {
		
		$editar = new AjaxGestionarUsuarios();
		$editar -> idUsuario = $_POST['idUsuario'];
		$editar -> ajaxEditarUsuario();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['validarUsuario'])) {
		
		$valUsuario = new AjaxGestionarUsuarios();
		$valUsuario -> validarUsuario = $_POST['validarUsuario'];
		$valUsuario -> ajaxValidarUsuario();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['eliminarUsuario'])) {

		$valUsuario = new AjaxGestionarUsuarios();
		$valUsuario -> eliminarUsuario = $_POST['eliminarUsuario'];
		$valUsuario -> ajaxEliminarUsuario();

	}
