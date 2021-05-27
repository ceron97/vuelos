<?php

	/**
	 * 
	 */
	class gestionarVuelosPropiosControlador{
		/* ================================================================
		=							MOSTRAR VUELOS  					  =
        ================================================================= */
		static public function ctrMostrarVuelosPropios($item, $valor, $idUsuario){

			$tabla = "vuelos";
			$tablaRelacion = "vuelos_clientes";
			$aviones = "aviones";
			$pilotos = "usuarios";
			$municipios = "municipios";

			$respuesta = gestionarVuelosPropiosModelo::mdlMostrarVuelosPropios($tabla, $tablaRelacion, $item, $valor, $aviones, 
                                                                                $pilotos, $municipios, $idUsuario);

			return $respuesta;
		
		}

	}