<?php 

	/**
	 * 
	 */
	class gestionarInformacionPersonalControlador{
		/* ================================================================
        =							EDITAR USUARIOS						  =
        ================================================================= */
		static public function ctrEditarUsuario(){

			if (isset($_POST["regUsuarioEdit"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombresEdit"]) &&
						preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["regUsuarioEdit"])) {

					$encriptar = "";
				
					$tabla = "usuarios";

					if ($_POST["regPasswordEdit"] != "") {

						if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordEdit"])) {

							$encriptar = crypt($_POST["regPasswordEdit"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

						}else{

							echo "<script>

								Swal.fire({

									type: 'error',
									html: '<h3>¡El nombreo el usuario no pueden ir vacios o con carecteres especiales!</h3>',
									confirmButtonColor: '#dc3545',
									confirmButtonText: 'Ok',

									}).then((result)=>{

									if(result.value){

										window.location = window.location;

									}  

								});

							</script>";

						}

					}else {
			
						$encriptar = $_POST['passwordActual'];

					}

					$datos = array("nombres" => $_POST["regNombresEdit"],
									"usuario" => $_POST["regUsuarioEdit"],
									"password" => $encriptar,
									"id_rol" => $_POST["regRolEdit"]);
									
					$respuesta = gestionarInformacionPersonalModelo::mdlEditarUsuarios($tabla, $datos);

					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({

									type: 'success',
									html: '<h3>¡El usuario se actualizo correctamente!</h3>',
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
								html: '<h3>¡El nombre o el usuario no pueden ir vacios o con carecteres especiales!</h3>',
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

        /* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarUsuarios($item,$valor){

			$tabla = "usuarios";
			$roles = "roles";

			$respuesta = gestionarInformacionPersonalModelo::mdlMostrarUsuario($tabla, $item, $valor, $roles);

			return $respuesta;
		
		}

	}