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
function esPalindromo(string $cadena): bool
{
    
    $comparador = new Collator('es_ES');
    $comparador->setStrength(Collator::PRIMARY);
    $resultado = mb_strtolower(mb_ereg_replace(' ', '', $cadena));
    if ($comparador->compare(revertirCadena($resultado), $resultado) === 0)
    {
        return true;
    }
    return false;
}

var_dump(esPalindromo("Dábale arroz a la zorra el abad"));
?>