<?php
function ecuacionSegundoGrado($a, $b, $c)
{
    $operacion = pow($b, 2) - 4 * $a * $c;
    if ($operacion < 0)
    {
        return false;
    }
    else
    {
        if ($operacion == 0)
        {
            $r = (-$b) / (2 * $a);
            return $r;
        }
        else
        {
            $r1 = ((-$b) + sqrt($operacion)) / (2 * $a);
            $r2 = ((-$b) - sqrt($operacion)) / (2 * $a);
            //$resultado = array($r1, $r2);
            $resultado = array($r1 = ((-$b) + sqrt($operacion)) / (2 * $a), $r1 = ((-$b) - sqrt($operacion)) / (2 * $a));
            return $resultado;
        }
    }
}
echo "Con dos soluciones";
echo "<pre>";
print_r(ecuacionSegundoGrado(2, -7, 3));
echo "</pre>";
echo "Con una solución: " . ecuacionSegundoGrado(1, -2, 1) . "<br>";
$resultado = ecuacionSegundoGrado(1, 1, 1);
if ($resultado == false)
{
    echo "La solución tiene números imaginarios";
}
?>