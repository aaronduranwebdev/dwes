<?php

/*
  Función llamada calculo_dinero_acciones que recibe tres parámetros:
  a.	Nombre_accion: Una cadena de texto
  b.	Un array asociativo donde cada índice del array será el nombre de una acción
  y el contenido la tasa de cambio de dicha acción.
  c.	Número de acciones

  Esta función busca el Nombre_accion en el array y devuelve la cantidad total de
  dinero que poseemos en esas acciones

 */

function calculo_dinero_acciones($nombre_accion, $arrayAcciones, $numeroAcciones) {
    if (array_key_exists($nombre_accion, $arrayAcciones)) {
        return $arrayAcciones[$nombre_accion] * $numeroAcciones;
    } else
        return 0;
}

?>