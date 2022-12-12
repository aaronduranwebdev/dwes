<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
// crea y ejecuta la consulta
$sql = "SELECT id_artista, nombre_artista FROM artistas";
if ($result = $pdo->query($sql)) {
    $datos = $result->fetchAll(); // todas las filas o tb llamado conjunto de resultados
    if (count($datos) > 0)
        foreach ($datos as $fila)
            echo $fila[0] . ":" . $fila[1] . "<br>\n";
    else
        echo "No se han encontrado registros.";
} else
    echo "ERROR: " . print_r($pdo->errorInfo());
unset($result);
unset($pdo);  // cierra la conexión
?> 

