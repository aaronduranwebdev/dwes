<?php

/* Creación de una función anónima desde una variable al que paso parámetros 
 * por referencia
 */

$texto = "Texto original al que sumo un ";
//Creo la función anónima que guardo en la variable modificar_texto
$modificar_texto = function (&$aux) {

    return $aux .= "texto añadido";
};
//Llamo a la variable como una función
echo $modificar_texto($texto);
echo "<br>$texto";

