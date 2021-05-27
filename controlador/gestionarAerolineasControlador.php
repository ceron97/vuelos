<?php 

	/**
	 * 
	 */
	class gestionarAerolineasControlador{

		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function ctrCrearAerolineas(){
				
			if (isset($_POST["regCodigoAdd"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombreAdd"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoAdd"])) {
					
					$item = "id_piloto";
					$valor = $_POST["regPilotoAdd"];
					$tabla = "aerolineas";
		
					$piloto = gestionarAerolineasModelo::mdlMostrarPilotosAerolineas($tabla, $item, $valor);

					if ($piloto) {
						
						echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El piloto ya esta registrado en otra aerolinea!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								}).then((result)=>{

								if(result.value){

									window.location = window.location;

								}  

							});

						</script>";
						
					}else{

						$tabla = "aerolineas";

						$datos = array("nombre" => $_POST["regNombreAdd"],
										"codigo" => $_POST["regCodigoAdd"],
										"id_piloto" => $_POST["regPilotoAdd"]);
						
						$respuesta = gestionarAerolineasModelo::mdlIngresarAerolinea($tabla, $datos);

						if($respuesta == "ok"){

							echo "<script>

								Swal.fire({
										
										type: 'success',
										html: '<h3>¡La aerolinea se registro correctamente!</h3>',
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
									html: '<h3>¡Ocurrio un error, la aerolinea no pudo ser creada!</h3>',
									confirmButtonColor: '#dc3545',
									confirmButtonText: 'Ok',

									});

							</script>";

						}

					}

				}else{

					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El nombre o el codigo no puede contener caractes especiales!</h3>',
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
		static public function ctrMostrarAerolineas($item,$valor){

			$tabla = "aerolineas";
			$usuarios = "usuarios";

			$respuesta = gestionarAerolineasModelo::mdlMostrarAerolineas($tabla, $item, $valor, $usuarios);

			return $respuesta;
		
		}

		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarPilotos($item,$valor){

			$tabla = "usuarios";
			$roles = "roles";
			$piloto = "id_rol";
			$pilotoId = 2;

			$respuesta = gestionarAerolineasModelo::mdlMostrarPilotos($tabla, $item, $valor, $piloto, $pilotoId, $roles);

			return $respuesta;
		
		}

		/* ================================================================
        =							EDITAR USUARIOS						  =
        ================================================================= */
		static public function ctrEditarAerolineas(){

			if (isset($_POST["regCodigoEdit"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombreEdit"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoEdit"])) {

					$item = "id_piloto";
					$valor = $_POST["regPilotoEdit"];
					$tabla = "aerolineas";
		
					$piloto = gestionarAerolineasModelo::mdlMostrarPilotosAerolineas($tabla, $item, $valor);

					if ($piloto) {
						
						echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El piloto ya esta registrado en otra aerolinea!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								}).then((result)=>{

								if(result.value){

									window.location = window.location;

								}  

							});

						</script>";
						
					}else{
						
						$tabla = "aerolineas";
						$datos = array("idFrabricante" => $_POST["idFrabricante"],
										"nombre" => $_POST["regNombreEdit"],
										"codigo" => $_POST["regCodigoEdit"],
										"id_piloto" => $_POST["regPilotoEdit"]);
										
						$respuesta = gestionarAerolineasModelo::mdlEditarAerolineas($tabla, $datos);

						if($respuesta == "ok"){

							echo "<script>
									Swal.fire({

										type: 'success',
										html: '<h3>¡La aerolinea se actualizo correctamente!</h3>',
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
									html: '<h3>¡Ocurrio un error, la aerolinea no pudo ser modificada!</h3>',
									confirmButtonColor: '#dc3545',
									confirmButtonText: 'Ok',

									});

							</script>";

						}

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

		static public function ctrBorrarAerolinea(){

			if (isset($_POST["eliminarAerolinea"])) {

				$tabla = "aerolineas";
				$datos = $_POST["eliminarAerolinea"];

				if ($_POST["eliminarAerolinea"] != null) {

					$respuesta = gestionarAerolineasModelo::mdlBorrarAerolinea($tabla, $datos);

					return $respuesta;

				}
			}
		}
	}