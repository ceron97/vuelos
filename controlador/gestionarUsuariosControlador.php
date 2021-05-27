<?php 

	/**
	 * 
	 */
	class gestionarUsuariosControlador{
		/*=============================================
		=              INGRESO DE USUARIO        	  =
		=============================================*/
				
		public function ctrIngresoUsuario(){

			if (isset($_POST["ingUsuario"])) {
				
				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
						preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {


					$passEncrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					$tabla = "usuarios";
					$item = "usuario";
					$roles = "roles";
					$valor = $_POST["ingUsuario"];

					$respuesta = gestionarUsuariosModelo::mdlMostrarUsuario($tabla, $item, $valor, $roles);

					/*
					echo"<script>
							console.log('".$respuesta["id_rol"]."');
							console.log('".$respuesta["nombres"]."');
							console.log('".$respuesta["password"]."');
							console.log('".$respuesta[4]."');
							console.log('".$passEncrypt."');
						</script>";  
						*/

					if ($respuesta) {
						if($respuesta["usuario"] == $_POST["ingUsuario"] &&
							$respuesta["password"] == $passEncrypt){

							$_SESSION["iniciarSesion"] = "ok";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["nombre"] = $respuesta["nombres"];
							$_SESSION["id_rol"] = $respuesta["id_rol"];
							$_SESSION["rol"] = $respuesta["nombreRol"];

							echo '<script>

								window.location = "inicio";

							</script>';
						}
					}else{

						echo"<script>
								swal.fire({

									type: 'error',
									html: '<h3>¡El usuario o la contraseña son incorrectos!</h3>',
									confirmButtonColor: '#dc3545',
									confirmButtonText: 'Ok',
									
								});
							</script>";  
					}
				}else{

					echo"<script>
							swal.fire({

								type: 'error',
								html: '<h3>¡El usuario o la contrseña contienen caracteres especiales!</h3>',
								confirmButtonColor: '#dc3545',
								confirmButtonText: 'Ok',
								
							});
						</script>";  

				}
			}
		}




		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function ctrCrearUsuario(){
				
			if (isset($_POST["regUsuarioAdd"])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["regNombresAdd"]) &&
						preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["regUsuarioAdd"]) &&
						preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordAdd"])) {


					$encriptado = crypt($_POST["regPasswordAdd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					$tabla = "usuarios";
					$rol = 3;
					$fecha = date("Y-m-d H:i:s");

					$datos = array("nombres" => $_POST["regNombresAdd"],
									"usuario" => $_POST["regUsuarioAdd"],
									"password" => $encriptado,
									"id_rol" => $rol,
									"fecha_creacion" => $fecha);

					$respuesta = gestionarUsuariosModelo::mdlIngresarUsuario($tabla, $datos);


					if($respuesta == "ok"){

						echo "<script>
								Swal.fire({
									
									type: 'success',
									html: '<h3>¡El usuario se registro correctamente!</h3>',
									confirmButtonColor: '#28a745',
									confirmButtonText: 'Ok',

									}).then((result)=>{

									if(result.value){
										";
										if (isset($_POST["crearLogueado"])) {
											echo "
												window.location = window.location;
												";
										}else{
											echo "
												window.location = 'login';
												";
										}
										echo
										"
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
		static public function ctrMostrarUsuarios($item,$valor){

			$tabla = "usuarios";
			$roles = "roles";

			$respuesta = gestionarUsuariosModelo::mdlMostrarUsuario($tabla, $item, $valor, $roles);

			return $respuesta;
		
		}


		/*=============================================
		=                Mostrar roles                =
		=============================================*/
		static public function ctrMostrarRoles($item, $valor){

			//Solicita la tabla de los roles
			$tabla = "roles";

			$respuesta = gestionarUsuariosModelo::mdlMostrarTablas($tabla, $item, $valor);

			return $respuesta;	

		}


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
									
					$respuesta = gestionarUsuariosModelo::mdlEditarUsuarios($tabla, $datos);

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

		/*=============================================
		= BORRAR O ELIMINAR USUARIO    =
		=============================================*/

		static public function ctrBorrarUsuario(){

			if (isset($_POST["eliminarUsuario"])) {

				$tabla = "usuarios";
				$datos = $_POST["eliminarUsuario"];

				if ($_POST["eliminarUsuario"] != null) {

					$respuesta = gestionarUsuariosModelo::mdlBorrarUsuario($tabla, $datos);
					 

					return $respuesta;

				}
			}
		}
	}