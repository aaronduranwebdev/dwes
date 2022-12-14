<?php
try {
    $mysqli = new mysqli("localhost", "root", "a", "musica");
    if ($mysqli->connect_error) {
        die('Error de Conexión (' .
            $mysqli->connect_errno . ') ' . "<br>" .
            $mysqli->connect_error);
    }

    $sql = "SELECT id_artista, nombre_artista FROM artistas";
    if ($result = $mysqli->query($sql)) // clase mysqli_result
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_object())
                echo $fila->id_artista . ":" .
                    $fila->nombre_artista . "<br>\n";
            $result->close();
        } else
            echo "No se han encontrado registros.";
    else
        echo "ERROR: " . $mysqli->error; // último error
    $mysqli->close(); // cerrar la conexión
//
} catch (mysqli_sql_exception $excepcion) {
    echo "Error " . $excepcion->getMessage();
}
?>
