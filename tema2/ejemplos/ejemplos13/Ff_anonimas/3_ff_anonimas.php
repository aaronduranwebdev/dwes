<?php

/* Funciones λ (lambda) o también llamadas funciones anónimas, son aquellas que 
 * no tienen un nombre y se invocan, o bien directamente o almacenando su 
 * referencia en una variable.
 */

/*
 * Funciones anónimas autoejecutables
 * Llamo a la función poniendo paréntesis antes de la palabra function, en la 
 * línea 15 y cerrándolos en la línea 17. Y a continuación le paso el parámetro 
 * (número 12), el cual tengo que poner entre paréntesis 
 */

(function ($a) {
    echo "El número es $a y su doble es " . ($a * 2) . "<br>";
}
)(12); // Resultado El número es 12 y su doble es 24
//Otro ejemplo donde concateno un resto con la función anónima autoejecutable

$dividendo = 25;
$divisor = 10;

echo "El resto de la división de $dividendo entre $divisor es " .
 (function ($num1, $num2) {
    return $num1 % $num2;
}
)($dividendo, $divisor);
