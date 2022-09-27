<?php
function maximoComunDivisor($a, $b)
{
    while (($a % $b) != 0)
    {
        $c = $b;
        $b = $a % $b;
        $a = $c;
    }
    return $b;
}
echo "El máximo común divisor de 15 y 20 es " . maximoComunDivisor(15, 20);
?>