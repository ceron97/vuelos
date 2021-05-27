<?php 

	/**
	 * 
	 */
	class gestionarVuelosControlador{

		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function 	ctrCrearVuelos(){
				
			if (isset($_POST["regCodigoAdd"])) {
				if (preg_match('/^[0-9.$,]+$/', $_POST["regCostoPasajeAdd"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoAdd"])) {


					$tabla = "aviones";
					$item = "id";
					$valor = $_POST["regAvionAdd"];
					$puestosDisponibles= gestionarVuelosModelo::mdlMostrarTablas($tabla, $item, $valor);

					$fecha = date('Y-m-d', strtotime($_POST["regFechaAdd"]));
					$hora = date('h:i:s', strtotime($_POST["regFechaAdd"]));

					$datos = array("codigo" => $_POST["regCodigoAdd"],
									"costo_pasaje" => $_POST["regCostoPasajeAdd"],
									"fecha" => $fecha,
									"hora" => $hora,
									"id_avion" => $_POST["regAvionAdd"],
									"id_piloto" => $_POST["regPilotoAdd"],
									"id_origen" => $_POST["regOrigenAdd"],
									"id_destino" => $_POST["regDestinoAdd"],
									"puestos_disponibles" => $puestosDisponibles['cantidad_puestos']);

					$tabla = "vuelos";

					$respuesta = gestionarVuelosModelo::mdlIngresarVuelo($tabla, $datos);

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({
									
									type: 'success',
									html: '<h3>¡El vuelo se registro correctamente!</h3>',
									confirmButtonColor: '#28a745',
									confirmButtonText: 'Ok',

									}).then((result)=>{

									if(result.value){

										window.location = window.location;

									}      
								});

							</script>";

					}else{

						echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡Ocurrio un error, el vuelo no pudo ser creado!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								});

						</script>";

					}

				}else{

					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El codigo o la cantidad no pueden contener caractes especiales!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								});

						</script>";
				}
			}
		}

		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarVuelos($item,$valor){

			$tabla = "vuelos";
			$aviones = "aviones";
			$pilotos = "usuarios";
			$municipios = "municipios";

			$respuesta = gestionarVuelosModelo::mdlMostrarVuelos($tabla, $item, $valor, $aviones, $pilotos, $municipios);

			return $respuesta;
		
		}

		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarAviones($item,$valor){

			$tabla = "aviones";

			$respuesta = gestionarVuelosModelo::mdlMostrarTablas($tabla, $item, $valor);

			return $respuesta;
		
		}

		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarUbicacion($item,$valor){

			$tabla = "municipios";

			$respuesta = gestionarVuelosModelo::mdlMostrarTablas($tabla, $item, $valor);

			return $respuesta;
		
		}

        /* ================================================================
        =							EDITAR USUARIOS						  =
        ================================================================= */
		static public function ctrEditarVuelos(){

			if (isset($_POST["regCodigoEdit"])) {
				if (preg_match('/^[0-9.$,]+$/', $_POST["regCostoPasajeEdit"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoEdit"])) {


					$fecha = date('Y-m-d', strtotime($_POST["regFechaEdit"]));
					$hora = date('h:i:s', strtotime($_POST["regFechaEdit"]));

					$datos = array("id" => $_POST["regIdVuelo"],
									"codigo" => $_POST["regCodigoEdit"],
									"costo_pasaje" => $_POST["regCostoPasajeEdit"],
									"fecha" => $fecha,
									"hora" => $hora,
									"id_avion" => $_POST["regAvionEdit"],
									"id_piloto" => $_POST["regPilotoEdit"],
									"id_origen" => $_POST["regOrigenEdit"],
									"id_destino" => $_POST["regDestinoEdit"],
									"puestos_disponibles" => $_POST['regPuestosDisponibles']);

					$tabla = "vuelos";
					

					$respuesta = gestionarVuelosModelo::mdlEditarVuelo($tabla, $datos);

					echo'<script>
								console.log("respuesta: '.$respuesta.'");
							</script>'; 

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({
									
									type: 'success',
									html: '<h3>¡El vuelo se modifico correctamente!</h3>',
									confirmButtonColor: '#28a745',
									confirmButtonText: 'Ok',

									}).then((result)=>{

									if(result.value){

										window.location = window.location;

									}      
								});

							</script>";

					}else{

						echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡Ocurrio un error, el vuelo no pudo ser modificado!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								});

						</script>";

					}
			
				}else{
					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El codigo o la cantidad no pueden contener caractes especiales!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								}).then((result)=>{

								if(result.value){

									window.location = window.location;

								}  

							});

						</script>";
				}
			}
		}

		/*=============================================
		= BORRAR O ELIMINAR USUARIO    =
		=============================================*/

		static public function ctrBorrarVuelo(){

			if (isset($_POST["eliminarUsuario"])) {

				$tabla = "usuarios";
				$datos = $_POST["eliminarUsuario"];

				if ($_POST["eliminarUsuario"] != null) {

					$respuesta = gestionarVuelosModelo::mdlBorrarUsuario($tabla, $datos);

					return $respuesta;

				}
			}
		}
	}