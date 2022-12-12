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

    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    //https://www.php.net/manual/es/pdo.begintransaction.php

    $pdo->beginTransaction();
    $aux = "insert into canciones (titulo_cancion,fk_artista_cancion) values ('crazy', 5);";
    $result = $pdo->exec($aux);
    $aux = "insert into canciones (titulo_cancion,fk_artista_cancion) values ('cryin', 5);";
    $result = $pdo->exec($aux);
    $crearTabla = 'CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `id_puntuaciones` int(11) NOT NULL AUTO_INCREMENT,`puntuacion` tinyint(4) NOT NULL,
  `fk_id_cancion` int(11) NOT NULL,PRIMARY KEY (`id_puntuaciones`),FOREIGN KEY (fk_id_cancion) REFERENCES canciones (id_cancion) on update cascade on delete cascade);';
    $pdo->exec($crearTabla);
    $sentencia = "SELECT id_cancion from artistas, canciones where (pais_artista='USA') and (id_artista=fk_artista_cancion)";
    $result = $pdo->query($sentencia); //Selecciono las canciones cuyos artistas son de USA
    foreach ($result as $res) {
        $aux = "insert into puntuaciones(fk_id_cancion, puntuacion) values ($res[0], 5);";
        $result = $pdo->exec($aux);
        //Puntúo con un cinco aquellas canciones cuyos artistas son de USA
        if ($result)
            echo "Introducida puntuación en canción con id $res[0]<br>";
    }
    $aux = "insert into cancione (titulo_cancion,fk_artista_cancion) values ('hola', 5);";
    $result = $pdo->exec($aux);
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Falló la sentencia: " . $e->getMessage();
    /*
     * Si hubo un fallo en  en la transacción por ejemplo en una sentencia SQL mal escrita,
     * no se deshacen las sentencias con un commit implícito (DROP TABLE o CREATE TABLE), incluídas
     * las anteriores a estas. A pesar de que hayamos puesto el autocommit a cero
     */
}
?>

