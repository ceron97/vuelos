<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarInformacionPersonalModelo
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

	}