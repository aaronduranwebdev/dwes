<?php

// definición de función: cambia el valor de $valor
function cambiaValor() {
    $valor = 25;         // variable local: ocultación
}

// define una variable global (a toda la página)
$valor = 11;
echo 'valor = ' . $valor."<br>";   // salida: valor = 11

cambiaValor();
echo 'valor = ' . $valor;   // salida: valor = 11
?> 

