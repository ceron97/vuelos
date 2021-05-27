<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/gestionarInformacionPersonalControlador.php';
	require_once '../modelo/gestionarInformacionPersonalModelo.php';

	class AjaxGestionarInformacionPersonal
	{
		
		public $idUsuario;

		//muestra al usuario que se solicito
		public function ajaxEditarUsuario(){

			$item = 'id';
			$valor = $this->idUsuario;

			$respuesta = gestionarInformacionPersonalControlador::ctrMostrarUsuarios($item, $valor);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['idUsuario'])) {
		
		$editar = new AjaxGestionarInformacionPersonal();
		$editar -> idUsuario = $_POST['idUsuario'];
		$editar -> ajaxEditarUsuario();

	}