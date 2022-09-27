<?php

$variable = "Aarón";

var_dump($variable);

echo "<br>Contenido de la variable: $variable<br>";

$variable = null;

if (empty($variable))
{
    echo "Después de asignarle un valor nulo: NULL";
}

?>