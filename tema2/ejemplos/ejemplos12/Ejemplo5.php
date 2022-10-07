<?php

// definición de función: calcula promedio
function calcMedia() {
    /*
     * func_get_args — Devuelve un array que contien la lista de argumentos que 
     * se le pasan a la función
     * func_num_args — Devuelve el nº de argumentos que se le pasan a la función
     */
    $args = func_get_args();
    $ctr = func_num_args();
    $suma = array_sum($args);
    $media = $suma / $ctr;
    return $media;
}

// invocación de la función con 3 argumentos:
echo "La media de 3, 6, 9 es ".calcMedia(3, 6, 9)."<br>";     // salida: 6

// invocación de la función con 8 argumentos
echo "La media de 100, 200, 100, 300, 50, 150, 250, 70 es ".calcMedia(100, 200, 100, 300, 50, 150, 250, 70)."<br>";
?>

