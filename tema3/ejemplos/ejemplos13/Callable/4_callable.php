<?php

class Comunicacion {

    static function saludar() {
        return "Hola" . "<br>";
    }

    function despedir() {
        return "Adiós" . "<br>";
    }

}

/*
 * Defino mi variable como un array de dos elementos, el primero será el nombre
 * de la clase y el segundo el método, el cual puede ser estático o no
 */
$miArray = array("Comunicacion", "saludar");

echo call_user_func($miArray); // Devuelve: Hola

/*
 * Otra forma es utilizando un método de un objecto instanciado, el cual se pasa 
 * como un array que contiene un objecto en el índice 0 y el nombre del método 
 * en el índice 1. Como es un objeto creado en "el aire" la función que debo pasarle
 * puede ser o no estática.
 */

$miArray2 = array(new Comunicacion, "despedir");
echo call_user_func($miArray2); // Devuelve: Adiós


$miArray3 = array(new Comunicacion, "saludar");
echo call_user_func($miArray3); // Devuelve: Adiós
