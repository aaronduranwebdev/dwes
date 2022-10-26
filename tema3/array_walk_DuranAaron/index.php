<?php
/**
 * Ejemplo de array_walk
 * @author a21aarondn <aaronduranwebdev@gmail.com>
 */
include('Alumno.php');
function subirNotaPepes(Alumno &$alumno)
{
    if (strcmp($alumno->getNombre(), "Pepe") == 0)
    {
        $alumno->setNota($alumno->getNota() * 1.5);
    }
}
$alumno1 = new Alumno("Pepe", "Domínguez Pérez", 6.5);
$alumno2 = new Alumno("Fran", "Martínez", 8.1);
$alumno3 = new Alumno("Pepe", "Salazar Cortés", 3);
$alumno4 = new Alumno("Luis", "Pérez Losada", 9.4);
$alumnos = array($alumno1, $alumno2, $alumno3, $alumno4);

foreach ($alumnos as $alumno)
{
    echo $alumno->getNombre() . ': ' . $alumno->getNota() . '<br>';
}

echo "<br>Después de la subida:<br>";
reset($alumnos);

array_walk($alumnos, 'subirNotaPepes');
while (current($alumnos))
{
    $posicion = key($alumnos);
    echo $alumnos[$posicion]->getNombre() . ': ' . $alumnos[$posicion]->getNota() . '<br>';
    next($alumnos);
}
?>