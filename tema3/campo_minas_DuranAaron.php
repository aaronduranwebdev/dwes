<?php
$filas = 20;
$columnas = 20;
$totalMinas = 10;
$minasPuestas = 0;
$campo = array();
for ($fila = 0; $fila < $filas; $fila++)
{
    for ($columna = 0; $columna < $columnas; $columna++)
    {
        $campo[$fila][$columna] = ".";
    }
}
for ($fila = 0; $fila < $filas; $fila++)
{
    for ($columna = 0; $columna < $columnas; $columna++)
    {
        $filaActual = rand(0, $filas - 1);
        $columnaActual = rand(0, $columnas - 1);
        if ($minasPuestas < $totalMinas)
        {
            if (!strcmp($campo[$filaActual][$columnaActual], "*") == 0)
            {
                $campo[$filaActual][$columnaActual] = "*";
                $minasPuestas++;
            }
        }


    }
}

if (count($campo) > 0)
{
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . implode('</th><th>', array_keys(current($campo))) . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($campo as $fila)
    {
        echo '<tr>';
        echo '<td>' . implode('</td><td>', $fila) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>