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
            $resultado = array($r1, $r2);
            return $resultado;
        }
    }
}

var_dump(ecuacionSegundoGrado(1, 2, 2));
?>