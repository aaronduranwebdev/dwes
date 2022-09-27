<?php
function limpiarTildes(string $cadena): string
{
    return str_replace(array('á', 'é', 'í', 'ó', 'ú'), 
        array('a', 'e', 'i', 'o', 'u'), $cadena);
}
function esPalindromo(string $cadena): bool
{
    $resultado = strtolower(limpiarTildes(str_replace(' ', '', $cadena)));
    if (strcmp(strrev($resultado), $resultado) == 0)
    {
        return true;
    }
    return false;
}

var_dump(esPalindromo("Dábale arroz a la zorra el abad"));
?>