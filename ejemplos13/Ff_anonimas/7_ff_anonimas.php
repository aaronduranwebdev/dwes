<?php

$saludo = function ($nombre) {
    return sprintf("Hola %s<br>", $nombre);
};

echo $saludo('Patricia'); // Devuelve Hola Patricia
echo call_user_func($saludo, "alumnos del curso de PHP"); // Devuelve Hola alumnos del curso de PHP

