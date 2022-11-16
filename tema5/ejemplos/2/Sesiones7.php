<?php

/*
 * Ejecutar este fichero dos veces y ver cómo la primera indica que no se puede
 * borrar. Entonces ejecutar Sesiones1.php y volver a ejecutar este fichero.
 * Hacerlo paso a paso para que se vea que sólo borra una variable de sesión
 */
session_start();
if (isset($_SESSION['nombre'])) {
    unset($_SESSION['nombre']);
    echo 'Variable de sesión borrada';
} else
    echo "No se puede borrar la variable de sesión nombre";
?> 

