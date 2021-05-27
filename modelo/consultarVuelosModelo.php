<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class consultarVuelosModelo
	{
		
		static public function mdlMostrarVuelos($tabla, $item, $valor, $aviones, $pilotos, $municipios)
		{
			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, 
														$aviones.nombre AS nombreAvion, 
														$pilotos.nombres AS nombrePiloto,
														origen.nombre AS nombreOrigen,
														destino.nombre AS nombreDestino
														FROM $tabla 
														INNER JOIN $aviones ON $tabla.id_avion = $aviones.id
														INNER JOIN $pilotos ON $tabla.id_piloto = $pilotos.id
														INNER JOIN $municipios AS origen ON $tabla.id_origen = origen.id
														INNER JOIN $municipios AS destino ON $tabla.id_destino = destino.id
                                                        WHERE $tabla.$item = :$item");
				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetch();

				$stmt = null;

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, 
														$aviones.nombre AS nombreAvion, 
														$pilotos.nombres AS nombrePiloto,
														origen.nombre AS nombreOrigen,
														destino.nombre AS nombreDestino
														FROM $tabla 
														INNER JOIN $aviones ON $tabla.id_avion = $aviones.id
														INNER JOIN $pilotos ON $tabla.id_piloto = $pilotos.id
														INNER JOIN $municipios AS origen ON $tabla.id_origen = origen.id
														INNER JOIN $municipios AS destino ON $tabla.id_destino = destino.id");

                $stmt -> execute();

                return $stmt -> fetchAll();

				$stmt = null;

			}
			
		}

		static public function mdlMostrarVuelosConsult($tabla, $item, $aviones, $pilotos, $municipios, $where)
		{
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, 
													$aviones.nombre AS nombreAvion, 
													$pilotos.nombres AS nombrePiloto,
													origen.nombre AS nombreOrigen,
													destino.nombre AS nombreDestino
													FROM $tabla 
													INNER JOIN $aviones ON $tabla.id_avion = $aviones.id
													INNER JOIN $pilotos ON $tabla.id_piloto = $pilotos.id
													INNER JOIN $municipios AS origen ON $tabla.id_origen = origen.id
													INNER JOIN $municipios AS destino ON $tabla.id_destino = destino.id 
													$where");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt = null;

			
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
							EDITAR Usuario
       	================================================================= */
		static public function mdlEditarVuelo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET puestos_disponibles = :puestos_disponibles 
													WHERE id = :id");

			$stmt -> bindparam(":id", $datos["id"], PDO::PARAM_STR);
			$stmt -> bindparam(":puestos_disponibles", $datos["puestos_disponibles"], PDO::PARAM_STR);


            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt = null;

		}

		/* ================================================================
		=					      Registro Usuario			  	 		  =
       	================================================================= */
		static public function mdlComprarVuelo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_vuelo, id_cliente) 
													VALUES (:id_vuelo, :id_cliente)");

			$stmt -> bindparam(":id_vuelo", $datos["id_vuelo"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt = null;
		}

	}