<?php

//https://www.php.net/manual/en/language.variables.scope.php

function cambiaValor() {
    global $valor;  // global: para que $valor no sea local
    //Poner un breakpoint para ver cómo se define la variable
    $valor = 25;
}

// define una variable en el main y muestra su valor
$valor = 11;
echo 'valor = ' . $valor."<br>";   // salida: valor = 11
cambiaValor(); 
echo 'valor = ' . $valor;   // salida: valor = 25
?> 

