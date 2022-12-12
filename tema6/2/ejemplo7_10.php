<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: No se puede conectar: " . $e->getMessage());
}
$sql = "SELECT id_artista, nombre_artista FROM artistas";
if ($result = $pdo->query($sql)) { //$result es un objeto PDOStatement
    // recupera el registro como un array indexado
    $fila = $result->fetch(PDO::FETCH_NUM);
    echo "Array indexado " . $fila[0] . ":" . $fila[1] . "<br>\n";

    // recupera el registro como array asociativo
    $fila = $result->fetch(PDO::FETCH_ASSOC);
    echo "Array asociativo " . $fila['id_artista'] . ":" . $fila['nombre_artista'] . "<br>\n";

// recupera el registro como un objeto
    $fila = $result->fetch(PDO::FETCH_OBJ);
    echo "Registro como objeto " . $fila->id_artista . ":" . $fila->nombre_artista . "<br>\n";

    // recupera el reg. usando combinación de estilos
    $fila = $result->fetch(PDO::FETCH_LAZY);
    echo "Combinación estilos " . $fila['id_artista'] . ":" . $fila->nombre_artista . "<br>\n";
} else
    echo "ERROR: No se puede ejecutar $sql. " .
    print_r($pdo->errorInfo());
unset($result);
unset($pdo); // cierra la conexión
?>

