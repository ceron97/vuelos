<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarVuelosModelo
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
		static public function mdlIngresarVuelo($tabla, $datos){

			

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, costo_pasaje, fecha, hora, id_avion, 
														id_piloto, id_origen, id_destino, puestos_disponibles) 
													VALUES (:codigo, :costo_pasaje, :fecha, :hora, :id_avion, :id_piloto, 
														:id_origen, :id_destino, :puestos_disponibles)");

			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt -> bindparam(":costo_pasaje", $datos["costo_pasaje"], PDO::PARAM_STR);
			$stmt -> bindparam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt -> bindparam(":hora", $datos["hora"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_avion", $datos["id_avion"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_origen", $datos["id_origen"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_destino", $datos["id_destino"], PDO::PARAM_STR);
			$stmt -> bindparam(":puestos_disponibles", $datos["puestos_disponibles"], PDO::PARAM_STR);

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
		static public function mdlEditarVuelo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo,  
													costo_pasaje = :costo_pasaje, 
													fecha = :fecha, 
													hora = :hora, 
													id_avion = :id_avion, 
													id_piloto = :id_piloto, 
													id_origen = :id_origen, 
													id_destino = :id_destino, 
													puestos_disponibles = :puestos_disponibles 
													WHERE id = :id");

			$stmt -> bindparam(":id", $datos["id"], PDO::PARAM_STR);
			$stmt -> bindparam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt -> bindparam(":costo_pasaje", $datos["costo_pasaje"], PDO::PARAM_STR);
			$stmt -> bindparam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt -> bindparam(":hora", $datos["hora"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_avion", $datos["id_avion"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_origen", $datos["id_origen"], PDO::PARAM_STR);
			$stmt -> bindparam(":id_destino", $datos["id_destino"], PDO::PARAM_STR);
			$stmt -> bindparam(":puestos_disponibles", $datos["puestos_disponibles"], PDO::PARAM_STR);


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