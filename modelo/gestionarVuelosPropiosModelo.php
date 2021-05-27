<?php 

	require_once "conexion.php";

	/**    
	 * 
	 */
	class gestionarVuelosPropiosModelo
	{
		
		static public function mdlMostrarVuelosPropios($tabla, $tablaRelacion, $item, $valor, $aviones, $pilotos, $municipios, $idUsuario)
		{
			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, 
														$aviones.nombre AS nombreAvion, 
														$pilotos.nombres AS nombrePiloto,
														origen.nombre AS nombreOrigen,
														destino.nombre AS nombreDestino
														FROM $tablaRelacion, $tabla 
														INNER JOIN $aviones ON $tabla.id_avion = $aviones.id
														INNER JOIN $pilotos ON $tabla.id_piloto = $pilotos.id
														INNER JOIN $municipios AS origen ON $tabla.id_origen = origen.id
														INNER JOIN $municipios AS destino ON $tabla.id_destino = destino.id
                                                        WHERE vuelos_clientes.id_vuelo = vuelos.id 
                                                        AND vuelos_clientes.id_cliente = :idUsuario");
				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> bindparam(":idUsuario", $idUsuario, PDO::PARAM_STR);
				$stmt -> execute();

				return $stmt -> fetch();

				$stmt = null;

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT $tabla.*, 
														$aviones.nombre AS nombreAvion, 
														$pilotos.nombres AS nombrePiloto,
														origen.nombre AS nombreOrigen,
														destino.nombre AS nombreDestino
														FROM $tablaRelacion, $tabla 
														INNER JOIN $aviones ON $tabla.id_avion = $aviones.id
														INNER JOIN $pilotos ON $tabla.id_piloto = $pilotos.id
														INNER JOIN $municipios AS origen ON $tabla.id_origen = origen.id
														INNER JOIN $municipios AS destino ON $tabla.id_destino = destino.id
                                                        WHERE vuelos_clientes.id_vuelo = vuelos.id 
                                                        AND vuelos_clientes.id_cliente = :idUsuario");

                $stmt -> bindparam(":idUsuario", $idUsuario, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetchAll();

				$stmt = null;

			}
			
		}

	}