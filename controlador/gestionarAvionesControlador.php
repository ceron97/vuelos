<?php 

	/**
	 * 
	 */
	class gestionarAvionesControlador{

		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function ctrCrearAviones(){
				
			if (isset($_POST["regCodigoAdd"])) {
					
				if (preg_match('/^[0-9]+$/', $_POST["regCodigoAdd"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCantidadPuestosAdd"])) {

							
					$tabla = "aviones";

					$datos = array("nombre" => $_POST["regNombreAdd"],
									"codigo" => $_POST["regCodigoAdd"],
									"cantidad_puestos" => $_POST["regCantidadPuestosAdd"],
									"id_fabricante" => $_POST["selectFabricanteAdd"]);

					$respuesta = gestionarVuelosModelo::mdlIngresarVuelo($tabla, $datos);

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({
									
									type: 'success',
									html: '<h3>¡El avion se registro correctamente!</h3>',
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
								html: '<h3>¡Ocurrio un error, el avion no pudo ser creado!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								});

						</script>";

					}

				}else{

					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El codigo y la cantidad de puestos no puede contener caractes especiales!</h3>',
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
		static public function ctrMostrarAviones($item,$valor){

			$tabla = "aviones";
			$fabricante = "fabricante";

			$respuesta = gestionarAvionesModelo::mdlMostrarAviones($tabla, $item, $valor, $fabricante);

			return $respuesta;
		
		}

		/* ================================================================
        =							EDITAR USUARIOS						  =
        ================================================================= */
		static public function ctrEditarAviones(){

			if (isset($_POST["regCodigoEdit"])) {
				if (preg_match('/^[0-9]+$/', $_POST["regCantidadPuestosEdit"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoEdit"])) {

					$tabla = "aviones";

					$datos = array("idAvion" => $_POST["idAvion"],
									"nombre" => $_POST["regNombreEdit"],
									"codigo" => $_POST["regCodigoEdit"],
									"cantidad_puestos" => $_POST["regCantidadPuestosEdit"],
									"id_fabricante" => $_POST["selectFabricanteEdit"]);
				
					
					$respuesta = gestionarAvionesModelo::mdlEditarAviones($tabla, $datos);

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({

									type: 'success',
									html: '<h3>¡El avion se actualizo correctamente!</h3>',
									confirmButtonColor: '#28a745',
									confirmButtonText: 'Ok',

									}).then((result)=>{

									if(result.value){

										window.location = window.location;
									}      
								});

						</script>";

					} 
			
				}else{
					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El nombre o el codigo no pueden ir vacios o con carecteres especiales!</h3>',
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

		static public function ctrBorrarAvion(){

			if (isset($_POST["eliminarAvion"])) {

				$tabla = "aviones";
				$datos = $_POST["eliminarAvion"];

				if ($_POST["eliminarAvion"] != null) {

					$respuesta = gestionarAvionesModelo::mdlBorrarAvion($tabla, $datos);

					return $respuesta;

				}
			}
		}
	}