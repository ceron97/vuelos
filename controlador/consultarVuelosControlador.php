<?php

	/**
	 * 
	 */
	class consultarVuelosControlador{

		/* ================================================================
		=						Registro de usuario						  =
        ================================================================= */
		static public function 	ctrCrearCompra($valorVuelo, $valorIdUser){

			$tabla = "vuelos";
			$aviones = "aviones";
			$pilotos = "usuarios";
			$municipios = "municipios";
			$item = 'id';
			$valor = $valorVuelo;

			$respuestaPuestos = consultarVuelosModelo::mdlMostrarVuelos($tabla, $item, $valor, $aviones, $pilotos, $municipios);
			$respuestaPuestos = $respuestaPuestos['puestos_disponibles'] - 1;

			$tabla = "vuelos";
			$datos = array("id" => $valorVuelo,
							"puestos_disponibles" => $respuestaPuestos);

			$respuesta = consultarVuelosModelo::mdlEditarVuelo($tabla, $datos);

			if($respuesta == "ok"){

				$tabla = "vuelos_clientes";
				$datos = array("id_vuelo" => $valorVuelo,
								"id_cliente" => $valorIdUser);

				$respuesta = consultarVuelosModelo::mdlComprarVuelo($tabla, $datos);

				return $respuesta;

			}else{
				
				return $respuesta;

			}

		}

		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarVuelos($item,$valor){

			$tabla = "vuelos";
			$aviones = "aviones";
			$pilotos = "usuarios";
			$municipios = "municipios";

			$respuesta = consultarVuelosModelo::mdlMostrarVuelos($tabla, $item, $valor, $aviones, $pilotos, $municipios);

			return $respuesta;
		
		}


		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarVuelosConsult($item, $valorFechaInicial, $valorFechaFinal, $valorDestino, $valorOrigen){

			$tabla = "vuelos";
			$aviones = "aviones";
			$pilotos = "usuarios";
			$municipios = "municipios";

			$fechaInicial = '';
			$horaInicial = '';
			$fechaFinal = '';
			$horaFinal = '';

			$where = '';

			if ($valorFechaInicial !== '') {
				$fechaInicial = date('Y-m-d', strtotime($valorFechaInicial));
				$horaInicial = date('h:i:s', strtotime($valorFechaInicial));

				$where = $where.'WHERE '.$tabla.'.fecha >= '.$fechaInicial.' AND '.$tabla.'.hora >= '.$horaInicial.'';
			}

			if ($valorFechaFinal !== '') {
				$fechaFinal = date('Y-m-d', strtotime($valorFechaFinal));
				$horaFinal = date('h:i:s', strtotime($valorFechaFinal));

				if ($valorFechaInicial !== '') {
					$where = $where.' AND '.$tabla.'.fecha >= '.$fechaInicial.' AND '.$tabla.'.hora >= '.$horaFinal.'';
				}else{
					$where = $where.'WHERE '.$tabla.'.fecha <= '.$fechaFinal.' AND '.$tabla.'.hora <= '.$horaFinal.'';
				}
			}

			if ($valorDestino != '') {
				if ($valorFechaFinal !== '') {
					$where = $where.' AND '.$tabla.'.id_destino = '.$valorDestino.'';
				}else{
					$where = $where.'WHERE '.$tabla.'.id_destino = '.$valorDestino.'';
				}
			}

			if ($valorOrigen != '') {
				if ($valorDestino !== '') {
					$where = $where.' AND '.$tabla.'.id_origen = '.$valorOrigen.'';
				}else{
					$where = $where.'WHERE '.$tabla.'.id_origen = '.$valorOrigen.'';
				}
			}

			$respuesta = consultarVuelosModelo::mdlMostrarVuelosConsult($tabla, $item, $aviones, $pilotos, $municipios, $where);

			return $respuesta;
		
		}


		/* ================================================================
		=							MOSTRAR USUARIOS					  =
        ================================================================= */
		static public function ctrMostrarUbicacion($item,$valor){

			$tabla = "municipios";

			$respuesta = consultarVuelosModelo::mdlMostrarTablas($tabla, $item, $valor);

			return $respuesta;
		
		}
	}