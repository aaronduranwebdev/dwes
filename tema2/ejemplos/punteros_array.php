<?php
$array2 = ["a", "b", "color" => "green", "shape" => "trapezoid", 4];

reset($array2);
do
{
    echo key($array2) . ' => ' . current($array2) . '<br>';
} while (next($array2));
reset($array2);
$array2[] = "hola";
echo "<br>";
do
{
    echo key($array2) . ' => ' . current($array2) . '<br>';
} while (next($array2));
?>