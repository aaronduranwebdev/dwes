<?php
/* Cree un programa que tome como variable el año 2020 e indique si es bisiesto.
  Nota: Un año es bisiesto si divisible por 400 o por 4 pero no por 100 */
function esBisiesto(int $año): bool
{
    return (($año % 4 == 0 && $año % 100 != 0) || $año % 400 == 0);
}
$año = 2020;

echo esBisiesto($año) ? "Es bisiesto" : "No es bisiesto";


?>