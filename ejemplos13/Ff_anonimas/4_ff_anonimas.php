<?php

/* Funciones anónimas con paso de variables definidas en un contexto superior
 * Como no podemos utilizar variables definidas en un contexto superior podemos
 * importarlas para poder utilizarlas dentro de una función anónima. Para ello 
 * utilizamos la palabra reservada use
 */

$variable = 25;
$doble = function () use ($variable) {
    return sqrt($variable);
};
echo "La raíz cuadrada de $variable es " . $doble();
