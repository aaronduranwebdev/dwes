<?php

function suma(&$item, $ind, $valor_a_sumar) {
    $item += $valor_a_sumar;
}

$param = 5;
$array1 = array(0, 20, 30);
array_walk($array1, "suma", $param);
var_dump($array1);
?>