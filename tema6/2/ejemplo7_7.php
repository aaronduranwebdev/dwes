<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
}
$sql = "SELECT id_artista, nombre_artista 
      FROM artistas";
if ($resultado = $pdo->query($sql))
//Devuelve un set de resultados como un objeto PDOStatement  
    while ($fila = $resultado->fetch())
        echo $fila[0] . ":" . $fila[1] . "<br>\n";
else
    echo "ERROR: " . print_r($pdo->errorInfo());
unset($resultado);
unset($pdo);  // cierra la conexión

?>