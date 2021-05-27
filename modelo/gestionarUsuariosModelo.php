<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarUsuariosModelo
	{
		
		static public function mdlMostrarUsuario($tabla, $item, $valor, $roles)
		{
			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, $roles.nombre AS nombreRol FROM $tabla 
														INNER JOIN $roles ON $tabla.id_rol = $roles.id WHERE $tabla.$item = :$item");
				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();


				return $stmt -> fetch();

				$stmt = null;

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, $roles.nombre AS nombreRol FROM $tabla 
														INNER JOIN $roles ON $tabla.id_rol = $roles.id");

                $stmt -> execute();

                return $stmt -> fetchAll();

				$stmt = null;

			}
			
		}

		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarTablas($tabla, $item, $valor){
			//Valida si se esta recibiendo un dato, en tal caso manda la
			//informacion de un unico usuario, en caso contrario,
			//envia la información de todos los usarios, esta funcion
			//responde a las tablas de permisos, roles de la base de datos
			if ($item != null) {

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt ->fetch();


			}else{

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt ->fetchAll();

			}
			
			$stmt = null;

		}

		/* ================================================================
		=					      Registro Usuario			  	 		  =
       	================================================================= */
		static public function mdlIngresarUsuario($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, usuario, password, id_rol, fecha_creacion) 
													VALUES (:nombres, :usuario, :password, :id_rol, :fecha_creacion)");

			$stmt -> bindparam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt -> bindparam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt -> bindparam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_rol", $datos["id_rol"], PDO::PARAM_STR);
			$stmt -> bindparam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt = null;
		}

		/* ================================================================
							EDITAR Usuario
       	================================================================= */
		static public function mdlEditarUsuarios($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres,  
													password = :password, 
													id_rol = :id_rol 
													WHERE usuario = :usuario");

			$stmt -> bindparam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt -> bindparam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt -> bindparam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_rol", $datos["id_rol"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt = null;

		}

		/*=============================================
		=            ACTUALIZAR USUARIO           =
		=============================================*/
		static public function mdlActualizarUsuarios($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindparam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindparam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt = null;

		}

		/* ================================================================
		BORRAR Usuario
		================================================================= */
		static public function mdlBorrarUsuario($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");
			
		$stmt -> bindparam(":id", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

				return "ok";

		}else{

				return "error";

		}

			$stmt = null;
		
		}
	}