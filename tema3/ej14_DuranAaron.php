<?php

function revertirCadena(string $cadena): string
{
    $longitud = mb_strlen($cadena);

    if ($longitud == 1)
    {
        return $cadena;
    }
    else
    {
        $longitud--;

        return revertirCadena(mb_substr($cadena, 1, $longitud)) . mb_substr($cadena, 0, 1);
    }
}

print_r(revertirCadena("Me gusta el IES de Téis"));

?>