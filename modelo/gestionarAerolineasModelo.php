<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarAerolineasModelo
	{
		
		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarAerolineas($tabla, $item, $valor, $usuarios){
			if ($item != null) {

				$stmt = conexion::conectar()->prepare("SELECT $tabla.*, $usuarios.nombres AS nombrePiloto FROM $tabla 
														INNER JOIN $usuarios ON $tabla.id_piloto = $usuarios.id
														WHERE $tabla.$item = :$item");

				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt ->fetch();


			}else{

				$stmt = conexion::conectar()->prepare("SELECT $tabla.*, $usuarios.nombres AS nombrePiloto FROM $tabla
														INNER JOIN $usuarios ON $tabla.id_piloto = $usuarios.id");

				$stmt -> execute();

				return $stmt ->fetchAll();

			}
			
			$stmt = null;

		}

		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarPilotos($tabla, $item, $valor, $piloto, $pilotoId){
			if ($item != null) {

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla 
														WHERE $item = :$item AND $piloto = $pilotoId");

				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt ->fetch();


			}else{

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla 
														WHERE $piloto = $pilotoId");

				$stmt -> execute();

				return $stmt ->fetchAll();

			}
			
			$stmt = null;

		}

		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarPilotosAerolineas($tabla, $item, $valor){
			if ($item != null) {

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla 
														WHERE $item = :$item");

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
		static public function mdlIngresarAerolinea($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, codigo, id_piloto) 
													VALUES (:nombre, :codigo, :id_piloto)");

			$stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);

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
		static public function mdlEditarAerolineas($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  
													codigo = :codigo, 
													id_piloto = :id_piloto 
													WHERE id = :idFrabricante");

			$stmt -> bindparam(":idFrabricante", $datos["idFrabricante"], PDO::PARAM_STR);
			$stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);

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
		static public function mdlBorrarAerolinea($tabla, $datos){
		
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