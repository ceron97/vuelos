<?php 

	/*=============================================
	=             	  CONTROLADORES      	      =
	=============================================*/	
	require_once "./controlador/gestionarAerolineasControlador.php";
	require_once "./controlador/gestionarAvionesControlador.php";
	require_once "./controlador/gestionarFabricantesControlador.php";
	require_once "./controlador/gestionarUsuariosControlador.php";
	require_once "./controlador/gestionarVuelosControlador.php";
	require_once "./controlador/gestionarVuelosControlador.php";
	require_once "./controlador/gestionarVuelosPropiosControlador.php";
	require_once "./controlador/gestionarInformacionPersonalControlador.php";
	require_once "./controlador/consultarVuelosControlador.php";
	require_once "./controlador/plantillaControlador.php";
	

	/*=============================================
	=            		MODULOS         		 =
	=============================================*/
	require_once "./modelo/gestionarAerolineasModelo.php";
	require_once "./modelo/gestionarAvionesModelo.php";
	require_once "./modelo/gestionarFabricantesModelo.php";
	require_once "./modelo/gestionarUsuariosModelo.php";
	require_once "./modelo/gestionarVuelosModelo.php";
	require_once "./modelo/gestionarVuelosPropiosModelo.php";
	require_once "./modelo/gestionarInformacionPersonalModelo.php";
	require_once "./modelo/consultarVuelosModelo.php";
	
	

	$plantilla = new PlantillaControlador();

	$plantilla -> ctrPlantilla();