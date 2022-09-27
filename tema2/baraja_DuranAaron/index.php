<?php
function generarBaraja()
{
    for ($i = 0; $i < 40; $i++)
    {
        $baraja[$i] = '<img src="img/' . $i . '.png">';
    }
    return $baraja;
}
$generarTabla = function ($baraja, $texto) {
    $html = '<h1>' . $texto . '</h1><table>';
    for ($fila = 0; $fila < 4; $fila++)
    {
        $html .= '<tr>';
        for ($columna = 0; $columna < 10; $columna++)
        {
            $carta = (($fila * 10) + $columna);
            $html .= '<td>' . $baraja[$carta] . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
};
$baraja = generarBaraja();
echo $generarTabla($baraja, "Baraja ordenada");
shuffle($baraja);
echo $generarTabla($baraja, "Baraja desordenada");
?>