<?php

/*
 * Llamada a una función anónima con una sintaxis de ff variables
 * Si se llama a una variable que tiene paréntesis anexos a ella, PHP buscará 
 * una función con el valor que tiene dicha variable, e intentará ejecutarla. 
 */

$numero = 2;
$exp = 4;

// Definición de la función anónima asignándola a una variable, con paso de parámetros
$doble = function ($var, $exp) {
    return pow($var, $exp);
};
//Llamada a la función anónima  con paso de parámetro (último elemento del echo)
echo "El número $numero elevado a $exp da como resultado " . $doble($numero, $exp);
