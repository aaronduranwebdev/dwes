<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}

try {
    //https://www.php.net/manual/en/pdo.setattribute.php
    //Es necesario poner la siguiente sentencia para que salte la excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //https://www.php.net/manual/es/pdo.begintransaction.php

    $pdo->beginTransaction();
    $aux = "insert into canciones (titulo_cancion,fk_artista_cancion) values ('crazy', 5);";
    $result = $pdo->exec($aux);
    $aux = "insert into cancione (titulo_cancion,fk_artista_cancion) values ('cryin', 5);";
    $result = $pdo->exec($aux);
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Falló la sentencia: " . $e->getMessage();
}
?>

