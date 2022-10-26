<?php
$cadena = "Sin problema.";
echo '1. ' . strlen($cadena) . ' caracteres<br>';
echo '2. ' . strpos($cadena, "problema") . '<br>';
echo '3. ' . str_replace("problema", "problemas", $cadena) . '<br>';
echo '4. ' . chr(65) . chr(66) . chr(67) . '<br>';
$resultado = "";
for ($i = 0; $i < strlen($cadena); $i++)
{
    if (strcmp($cadena[$i], "n") == 0)
    {
        $resultado .= "N";
    }
    else
    {
        $resultado .= $cadena[$i];
    }
}
echo '5. ' . $resultado . '<br>';
echo '6. ' . strtoupper($cadena) . '<br>' . strtolower($cadena) . '<br>';
echo '7. ' . ltrim('    Sin problema') . '<br>';
echo '8. ' . strrev($cadena) . '<br>';
echo '9. ' . substr_count($cadena, 'o') . '<br>';
?>