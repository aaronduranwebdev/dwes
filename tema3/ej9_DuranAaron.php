<?php
/*
Definir una variable a la cual se le asigna un número decimal y, tras comprobar
que esa variable es de tipo coma flotante, obtener por pantalla un mensaje que 
nos indique el tipo y el valor almacenado. Investigar y usar la función is_float.   */
$puntoFlotante = 3.1415;
if (is_float($puntoFlotante))
{
    var_dump($puntoFlotante);
}
?>