<?php

/*
 * session_destroy() destruye toda la información asociada con la sesión actual.
 * No borra las variables globales asociadas con la sesión ni la cookie de sesión.
 * Para usar las variables de sesión de nuevo, tenemos que utilizar session_start()
 * session_unset borra todas las variables de sesión
 */

/*
 * Ejecutarlo normalmente una primera vez y ver que aunque partimos de
 * en un entorno limpio va a producirse un error al intentar acceder a un índice que 
 * no existe (nombre).
 * A pesar de que la última línea sea session_destroy sigue existiendo la cookie 
 * de sesión (comprobarlo con el editor de cookies).
 * 
 * Borrar las cookies para volver a partir de un entorno limpio y ejecutarlo paso a paso. 
 * Ponerse en la primera línea del script y ver que aparece la variable $_SESSION, pero vacía.
 * A continuación ejecutar normalmente Sesiones1.php y volver a ejecutar paso a
 * paso este script. Ahora $_SESSION va a ser un array de dos elementos: apellido
 * y nombre.
 * Ejecutamos de nuevo Sesiones1.php para crear las variables de sesión y ejecutamos 
 * este script una cuarta vez descomentando la línea donde está session_unset
 * veremos que ahora sí se eliminan las variables de sesión
 */
session_start();
echo $_SESSION['nombre'];
session_unset(); //Comentar y descomentar esta línea
session_destroy();
echo "<br>Se ha destruido la sesión pero siguen existiendo las variables de sesión "
 . "(en caso de haberlas) si no he hecho un session_unset().";
?> 

