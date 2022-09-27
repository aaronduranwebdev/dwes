<?php

function revertirCadena(string $cadena): string
{
    $longitud = strlen($cadena);

    if ($longitud == 1)
    {
        return $cadena;
    }
    else
    {
        $longitud--;

        return revertirCadena(substr($cadena, 1, $longitud)) . substr($cadena, 0, 1);
    }
}

print_r(revertirCadena("Me gusta el IES de Teis"));

?>