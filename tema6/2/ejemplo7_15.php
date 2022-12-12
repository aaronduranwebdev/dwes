<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: No se puede conectar: " . $e->getMessage());
}
// preparar el modelo de sentencia. 
$pais = 'USA';
$nombre = "ABBA";

$sql = 'SELECT nombre_artista, pais_artista FROM artistas WHERE pais_artista=:param_pais or nombre_artista=:param_nombre';

if ($stmt = $pdo->prepare($sql)) {
    $stmt->bindValue('param_pais', $pais, PDO::PARAM_STR);
    $stmt->bindValue('param_nombre', $nombre, PDO::PARAM_STR);
    if (!$stmt->execute()) {
        echo "No se pudo ejecutar la sentencia. Causa del error  ";
// No se puede usar PDO::errorInfo() porque sólo devuelve la información de error
// para las operaciones realizadas directamente en el manejador de la base de 
// datos (en nuestro caso $pdo). Si se crea un objeto a través de la sentencia 
// PDO::prepare() o PDO::query() y se produce un eror en $pdo,  PDO::errorInfo() no lo reflejará 
// Hay que llamar al método  PDOStatement::errorInfo() para devolver la información
// del error para una operación realizada por medio de un manejador de sentencias particular

        $error = $stmt->errorInfo();
        echo "<i>$error[2]</i> <br>";
    } else {
        while ($fila = $stmt->fetch())
            echo $fila["nombre_artista"] . " cuyo país es " . $fila['pais_artista'] . "<br>\n";
    }
} else {
    echo "No se pudo preparar la sentencia: $sql. ";
}
unset($stmt);
unset($pdo);  // cierra la conexión
?> 