<?php 
	
	//llama al controlador y modelo necesarios
	require_once '../controlador/consultarVuelosControlador.php';
	require_once '../modelo/consultarVuelosModelo.php';

	class AjaxConsultarVuelos
	{
		
		public $fechaInicial;
		public $fechaFinal;
		public $destino;
		public $origen;

		//muestra al usuario que se solicito
		public function ajaxEditarAerolinea(){

			$item = 'id';
			$valorFechaInicial = $this->fechaInicial;
			$valorFechaFinal = $this->fechaFinal;
			$valorDestino = $this->destino;
			$valorOrigen = $this->origen;

			$respuesta = consultarVuelosControlador::ctrMostrarVuelosConsult($item, $valorFechaInicial, 
																			$valorFechaFinal, $valorDestino, $valorOrigen);

			echo json_encode($respuesta);

		}

		public $comprarIdVuelo;
		public $idUser;

		//valida si el nombre de usuario ya existe en la base de datos
		public function ajaxComprarIdVuelo(){

			$valorVuelo = $this->comprarIdVuelo;
			$valorIdUser = $this->idUser;

			$respuesta = consultarVuelosControlador::ctrCrearCompra($valorVuelo, $valorIdUser);

			echo json_encode($respuesta);

		}

	}

	//valida si se solicito editar un usuario para mostrarlo
	if (isset($_POST['consultarVuelo'])) {
		
		$editar = new AjaxConsultarVuelos();
		$editar -> fechaInicial = $_POST['fechaInicial'];
		$editar -> fechaFinal = $_POST['fechaFinal'];
		$editar -> destino = $_POST['destino'];
		$editar -> origen = $_POST['origen'];
		$editar -> ajaxEditarAerolinea();

	}

	//valida si se solicito validar un usuario para verificar si
	//existe en la base de datos ese usuario
	if (isset($_POST['comprarIdVuelo'])) {
		
		$valUsuario = new AjaxConsultarVuelos();
		$valUsuario -> comprarIdVuelo = $_POST['comprarIdVuelo'];
		$valUsuario -> idUser = $_POST['idUser'];
		$valUsuario -> ajaxComprarIdVuelo();

	}