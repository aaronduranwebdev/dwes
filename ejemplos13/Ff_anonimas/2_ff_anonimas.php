<?php

/*
 * Llamar a la función anónima desde otra función, en forma de argumentos. 
 * Es decir, añadiendo la función anónima en otra función.
 */

/*
 * Definición de la función mostrar_texto. Esta es una función regular, que 
 * recibe un parámetro ($algo) e imprimirá por pantalla lo que se le pase en el 
 * argumento $algo, en este caso una función anónima
 */

function mostrar_texto($algo) {
    echo $algo();
}

/*
 * Llamada a la función definida anteriormente
 */
mostrar_texto(function () {
    return "Esto es algo";
});
