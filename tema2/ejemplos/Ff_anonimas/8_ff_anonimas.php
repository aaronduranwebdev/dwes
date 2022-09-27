<?php

/*
 *  call_user_func ( callable $callback [, mixed $parameter [, mixed $... ]] ): mixed
 *  Llama a la función pasada en el primer parámero (función callable) y los 
 *  siguientes parámetros opcionales son los valores que se le pasan a esa función
 *  En nuestro caso pasamos una función anónima que definimos de la línea 14 a la 16 
 *  Los parámetros son $dividendo y $divisor y los pasamos en la línea 17
 */

$dividendo = 25;
$divisor = 10;
echo "<br>El resto de la división de $dividendo entre $divisor es " .
 (call_user_func(function ($num1, $num2) {
    return $num1 % $num2;
},
        $dividendo, $divisor
)
);
