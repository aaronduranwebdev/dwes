<?php
function esMinusculas(string $cadena): bool
{

    for ($i = 0; $i < strlen($cadena); $i++)
    {
        if (ord($cadena[$i]) >= 65 && ord($cadena[$i]) <= 90)
        {
            return false;
        }
    }
    return true;
}

var_dump(esMinusculas("IES de Teis"));
var_dump(esMinusculas("ies de teis"));
?>