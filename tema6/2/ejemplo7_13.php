<?php

// define los valores a insertar
$canciones = array(
    array('All you need is love', 2),
    array('4 Versus', 6),
    array('Kylie Minogue', 9),
    array('Yellow Submarine', 2),
    array('Chiquitita', 5),
    array('Mamma mia', 4),
    array('Shine', 12),
    array('Hold On', 9),
);
try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: No se puede conectar: " . $e->getMessage());
}
// preparar el modelo de sentencia. 

$sql = "INSERT INTO canciones (titulo_cancion, 	fk_artista_cancion) 
	VALUES (?, ?)";

if ($stmt = $pdo->prepare($sql)) {
    foreach ($canciones as $c) {  //Atención con los índices
        $stmt->bindParam(1, $c[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $c[1], PDO::PARAM_INT);
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
        } else
            echo "Sentencia ejecutada correctamente ";
        echo $pdo->lastInsertId() . "<br>";
    }
} else {
    echo "No se pudo preparar la sentencia: $sql. ";
}
unset($stmt);
unset($pdo);  // cierra la conexión
?> 