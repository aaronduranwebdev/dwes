<?php

//Pasamos una variable por referencia (&). Esto permite modificar el valor de la
//variable y que lo conserve una vez finalizada la función

function concatena(&$cadena, $texto) {
    $cadena .= $texto;
}

$cad = 'Esto es una cadena: ';
concatena($cad, "abc");
echo $cad;    // imprime: Esto es una cadena, abc

?>

