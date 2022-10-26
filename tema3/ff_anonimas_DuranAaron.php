<?php
$numero = 2;
$doble = function ($valor) {
    return $valor * 2;
};

$variable = 4;
$triple = function () use ($variable) {
    return $variable * $variable * $variable ;
};

echo "Número original $numero<br>";
echo 'Tras aplicar la clausura doble ' . $doble($numero) . '<br>';
echo 'Tras aplicar la clausura triple ' . $triple() . '<br>';
?>