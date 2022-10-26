<?php
define("TASACAMBIO", 1.2);
/**
 * Función que convierte dólares a euros empleando una tasa de cambio
 * 
 * @author Aaron <aaronduranwebdev@gmail.com>
 * @param float $dolares Cantidad a convertir en dólares
 * @return float Cantidad en euros de la conversión
 */
function convertirDolarAEuro(float $dolares): float
{
    return $dolares * TASACAMBIO;
}
echo convertirDolarAEuro(50);
?>