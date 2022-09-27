<?php
$numero = 2;
$doble = function ($valor) {
    return $valor * 2;
};

$variable = 21.3333333333333;
$triple = function () use ($variable) {
    return $variable * 3;
};

echo "Número original $numero<br>";
echo 'Tras aplicar la clausura doble ' . $doble($numero) . '<br>';
echo 'Tras aplicar la clausura triple ' . $triple() . '<br>';
?>