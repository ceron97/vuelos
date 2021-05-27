<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarAvionesModelo
	{
		
		/*=============================================
		=             Muestra las tablas              =
		=============================================*/
		static public function mdlMostrarAviones($tabla, $item, $valor, $fabricante){
			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, $fabricante.nombre AS nombreFabricante FROM $tabla 
														INNER JOIN $fabricante ON $tabla.id_fabricante = $fabricante.id 
														WHERE $tabla.$item = :$item");

				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt ->fetch();


			}else{

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, $fabricante.nombre AS nombreFabricante FROM $tabla 
														INNER JOIN $fabricante ON $tabla.id_fabricante = $fabricante.id");

				$stmt -> execute();

				return $stmt ->fetchAll();

			}
			
			$stmt = null;

		}

		/* ================================================================
		=					      Registro Usuario			  	 		  =
       	================================================================= */
		static public function mdlIngresarAvion($tabla, $datos){

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
		static public function mdlEditarAviones($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  
													codigo = :codigo, 
													cantidad_puestos = :cantidad_puestos, 
													id_fabricante = :id_fabricante 
													WHERE id = :idAvion");

			$stmt -> bindparam(":idAvion", $datos["idAvion"], PDO::PARAM_STR);
			$stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt -> bindparam(":cantidad_puestos", $datos["cantidad_puestos"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_fabricante", $datos["id_fabricante"], PDO::PARAM_STR);

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
		static public function mdlBorrarAvion($tabla, $datos){
		
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