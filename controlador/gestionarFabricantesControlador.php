<?php 

	/**
	 * 
	 */
	class gestionarFabricantesControlador{

		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function ctrCrearFabricante(){
				
			if (isset($_POST["regCodigoAdd"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombreAdd"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoAdd"])) {
					
					$tabla = "fabricante";

					$datos = array("nombre" => $_POST["regNombreAdd"],
									"codigo" => $_POST["regCodigoAdd"]);
                    
					$respuesta = gestionarFabricantesModelo::mdlIngresarFabricante($tabla, $datos);


					if($respuesta == "ok"){

						echo "<script>

                            Swal.fire({
									
									type: 'success',
									html: '<h3>¡El fabricante se registro correctamente!</h3>',
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
								html: '<h3>¡Ocurrio un error, el usuario no pudo ser creado!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',

								});

						</script>";

					}

				}else{

					echo "<script>

							Swal.fire({

								type: 'error',
								html: '<h3>¡El usuario o la contraseña no puede contener caractes especiales!</h3>',
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
		static public function ctrMostrarFabricantes($item,$valor){

			$tabla = "fabricante";

			$respuesta = gestionarFabricantesModelo::mdlMostrarFabricantes($tabla, $item, $valor);

			return $respuesta;
		
		}

		/* ================================================================
        =							EDITAR USUARIOS						  =
        ================================================================= */
		static public function ctrEditarFabricante(){

			if (isset($_POST["regCodigoEdit"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombreEdit"]) &&
						preg_match('/^[0-9]+$/', $_POST["regCodigoEdit"])) {

					$tabla = "fabricante";

					$datos = array("idFrabricante" => $_POST["idFrabricante"],
									"nombre" => $_POST["regNombreEdit"],
									"codigo" => $_POST["regCodigoEdit"]);
									
					$respuesta = gestionarFabricantesModelo::mdlEditarFabricantes($tabla, $datos);

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({

									type: 'success',
									html: '<h3>¡El fabricante se actualizo correctamente!</h3>',
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

		static public function ctrBorrarFabricante(){

			if (isset($_POST["eliminarFabricante"])) {

				$tabla = "fabricante";
				$datos = $_POST["eliminarFabricante"];

				if ($_POST["eliminarFabricante"] != null) {

					$respuesta = gestionarFabricantesModelo::mdlBorrarFabricante($tabla, $datos);

					return $respuesta;

				}
			}
		}
	}