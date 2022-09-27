<?php

// definición de función: genera dirección de email
function creaDir($usuario, $dom = 'midominio.info') {
    return $usuario . '@' . $dom;
}

// invocación de función sin argumento opcional
// salida: 'Mi dirección de email es maria@midominio.info'
echo 'Mi dirección de email es ' . creaDir('maria')."<br>";

// invocación de función con argumento opcional
// salida: 'Mi dirección de email es daniel@dominio2.net'
echo 'Mi dirección de email es ' .creaDir('daniel', 'dominio2.net');
// los args. con valores por defecto son los últimos
?>
