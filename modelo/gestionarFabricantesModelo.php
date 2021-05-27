<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarFabricantesModelo
	{
		
		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarFabricantes($tabla, $item, $valor){
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
		static public function mdlIngresarFabricante($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, codigo) 
													VALUES (:nombre, :codigo)");

			$stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);

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
		static public function mdlEditarFabricantes($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  
													codigo = :codigo 
													WHERE id = :idFrabricante");

			$stmt -> bindparam(":idFrabricante", $datos["idFrabricante"], PDO::PARAM_STR);
			$stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);

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
		static public function mdlBorrarFabricante($tabla, $datos){
		
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