<?php

try {
    $db = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
}

//Comentar y descomentar las siguientes líneas para ver los errores
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
//Sentencia sql mal escrita intencionadamente id_artist en vez de id_artista
$sql = "SELECT id_artist, nombre_artista 
      FROM artistas";
if ($resultado = $db->query($sql))
//Devuelve un set de resultados como un objeto PDOStatement  
    while ($fila = $resultado->fetch())
        echo $fila[0] . ":" . $fila[1] . "<br>\n";
unset($resultado);
unset($db);
