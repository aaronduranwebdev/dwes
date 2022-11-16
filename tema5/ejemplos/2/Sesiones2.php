<?php
session_start();   // empieza la sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Lectura de variables de sesión</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><head>
    <body>
        <?php
        // lee las variables de la sesión:
        echo 'Hola de nuevo, ' .
        $_SESSION['nombre'] . '  ' . $_SESSION['apellido'];
        ?>
    </body>
</html> 

