<?php

// La función divide el string que recibe en palabras, las
// invierte y las devuelve como array
function invierte($frase) {
    $palabras = explode(' ', $frase);
    foreach ($palabras as $k => $v) {
        $palabras[$k] = strrev($v);
    }
    return $palabras;
}

// invocación de la función. Salida: atsah al atsiv
echo implode(' ', invierte('hasta la vista'));
?> 

