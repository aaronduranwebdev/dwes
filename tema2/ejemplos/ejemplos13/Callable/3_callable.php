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
 * de la clase y el segundo el método, el cual debe ser estático
 */
$miArray = array("Comunicacion", "saludar");

/*
 * Utilizo la sintaxis de funciones variables. A mi variable anteriormente definida
 * le añado unos paréntesis y ejecuta al método de la clase
 */
echo $miArray(); // Devuelve: Hola
//Al descomentar las 2 siguientes líneas saldrá un notice porque el método a utilizar debe ser estático.
$miArray2 = array("Comunicacion", "despedir");
echo $miArray2()."<br>"; // Devuelve: Adiós

/*
 * Otra forma es utilizando un método de un objecto instanciado, el cual se pasa 
 * como un array que contiene un objecto en el índice 0 y el nombre del método 
 * en el índice 1. Como es un objeto creado en "el aire" la función que debo pasarle
 * puede ser o no estática.
 */

$otroArray = array(new Comunicacion, "despedir");
echo $otroArray(); // Devuelve: Adiós
$otroArray = array(new Comunicacion, "saludar");
echo $otroArray(); // Devuelve: Hola