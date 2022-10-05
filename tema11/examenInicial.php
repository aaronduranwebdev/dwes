<?php
function revertirCadena(string &$cadena): string
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

function funcion1(array $arr_entrada, callable $funcion): string
{
    //array_walk_recursive($arr_entrada, $funcion);
    reset($arr_entrada);
    if ()
    while (current($arr_entrada))
    {
        $posicion = key($arr_entrada);
        echo $posicion;
        next($arr_entrada);
    }
}
echo funcion1();
?>