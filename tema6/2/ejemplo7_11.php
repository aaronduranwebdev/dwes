<?php

try {
    $pdo = new PDO('mysql:dbname=musica;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
// crea y ejecuta sentencia INSERT
$sql = "INSERT INTO artistas (nombre_artista, pais_artista) 
 VALUES ('Luciano Pavarotti', 'IT')";
$ret = $pdo->exec($sql);
// exec sólo para INSERT, UPDATE y DELETE. Devuelve el nº de columnas modificadas
// o borradas por la senteencia sql
//exec puede devolver el booleano FALSE pero también puede devolver un valor
//no boleano el cual se evalúa a falso. Se recomienda usar el operador === para
//comprobar el valor devuelto de esta función
if ($ret === false) {
    echo "ERROR: No se puede ejecutar $sql. <br>Causa del error ";
    $error = $pdo->errorInfo();
    echo "<i>$error[2]</i> <br>";
} else {
    $id = $pdo->lastInsertId();
    echo 'Nuevo artista con id: ' . $id . ' añadido';
}


//// crea y ejecuta la sentencia DELETE
$sql = "DELETE FROM artistas WHERE pais_artista = 'IT'";
$ret = $pdo->exec($sql); //num filas afectadas o false
if ($ret === false) {
    echo "Imposible ejecutar $sql. " .
    print_r($pdo->errorInfo());
    echo "<br>";
} else
if ($ret > 0)
    echo '<br>Borrados ' . $ret . ' registros.';
//// crea y ejecuta la sentencia TRUNCATE  
$sql = "truncate canciones";
$ret = $pdo->exec($sql);
if ($ret === false) {
    echo "Imposible ejecutar $sql. " .
    print_r($pdo->errorInfo());
    echo "<br>";
} else
    echo "<br>Borrado contenido tabla canciones";
unset($pdo);   // cierra la conexión
//
?> 

