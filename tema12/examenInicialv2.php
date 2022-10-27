<?php
class examen
{
    function sumar(int $num, int $cantidad): int
    {
        return $num += $cantidad;
    }
}
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

$arrayPrueba =
    array(1,
        array("buenos", 2,
            array(
                array("José", "Manuel"),
                "Pérez",
                40),
                "días"),
            3);

reset($arrayPrueba);
function funcion1(array $arr_entrada): string
{
    global $resultado;

    $actual = current($arr_entrada);


    if (!$actual)
    {
        return $resultado;
    }
    if (is_array($actual))
    {
        funcion1($actual);
    }
    else if (is_numeric($actual))
    {
        //$actual = call_user_func('sumar', $actual, 10);
        $clase = new examen();
        $funcion = 'sumar';
        $actual = $clase->$funcion($actual, 10);
        $resultado = $resultado . $actual . ":";

    }
    else if (is_string($actual))
    {
        //$actual = call_user_func('revertirCadena', $actual);
        $funcion = 'revertirCadena';
        $actual = $funcion($actual);
        $resultado = $resultado . $actual . ":";
    }
    next($arr_entrada);
    funcion1($arr_entrada);
    return mb_substr($resultado, 0, -1);
}
echo serialize(funcion1($arrayPrueba));
?>