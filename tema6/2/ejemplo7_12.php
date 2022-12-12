<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
$sql = "SELECT count(*) 
      FROM artistas where pais_artista='USA'";
if ($resultado = $pdo->query($sql))
    while ($fila = $resultado->fetch())
        echo "El número de artistas de USA es " . $fila[0] . "<br>\n";
else
    echo "ERROR: " . print_r($pdo->errorInfo());
unset($resultado);
unset($pdo);  // cierra la conexión
?>