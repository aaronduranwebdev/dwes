<?php

declare (strict_types=1);
/*
 * Al declarar strict_types, las funciones de PHP se rigen por el modo estricto, 
 * por lo tanto generarán TypeError si no reciben los parámetros 
 * tal y como están indicados en la definición de la función.
 */

/*
 * La función calculador recibe una string y dos números. 
 * El primer parámetro corresponde al nombre de una función y puesto que lo tengo 
 * que escribir como una string, debo desarrollar todas las funciones cuyos 
 * nombres sean los distintos valores que puede tomar esa string
 */

function calculador($operacion, int $numa, int $numb): int {
    $resul = $operacion($numa, $numb);
    return $resul;
}

function sumar(int $a, int $b): int {
    return $a + $b;
}

function multiplicar(int $a, int $b): int {
    return $a * $b;
}

function restar(int $a, int $b): int {
    return $a - $b;
}

$a = 5;
$b = 4;
$producto = calculador("multiplicar", $a, $b);
echo "El resultado de multiplicar $a * $b es $producto <br>";
$suma = calculador("sumar", $a, $b);
echo "El resultado de sumar $a + $b es $suma <br>";
$resta = calculador("restar", $a, $b);
echo "El resultado de restar $a - $b es $resta <br>";

/*
 * Otra forma de hacer las mismas operaciones es utilizando 
 * call_user_func()
 * La sintaxis de la función call_user_func es la siguiente: 
 * call_user_func ( callable $callback [, mixed $parameter [, mixed $... ]] ): mixed
 * Llama a la función pasada en el primer parámetro (función callable) y los 
 * siguientes parámetros opcionales son los valores que se le pasan a esa función
 */

echo "<br><br><b>Utilizando call_user_func()</b><br>";
$producto = call_user_func("multiplicar", $a, $b);
echo "El resultado de multiplicar $a * $b es $producto <br>";
$suma = call_user_func("sumar", $a, $b);
echo "El resultado de sumar $a + $b es $suma <br>";
$resta = call_user_func("restar", $a, $b);
echo "El resultado de restar $a - $b es $resta <br>";
