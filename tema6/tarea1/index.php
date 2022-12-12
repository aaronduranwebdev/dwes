<?php
try {
    $pdo = new PDO('mysql:dbname=recetas;host=localhost', 'root', '');
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
}
$sql = "SELECT receta.nombre, dificultad, tiempo, nombreartistico FROM receta INNER JOIN chef ON receta.cod_chef = chef.codigo ORDER BY nombreartistico";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tareas.css">
</head>

<body>
    <div id="contenido">
        <h1>LISTADO DE RECETAS</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Dificultad</th>
                <th>Tiempo</th>
                <th>Chef</th>
            </tr>
            <?php
            /*if ($resultado = $pdo->query($sql))
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
            echo "<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['dificultad'] . "</td><td>" . $fila['tiempo'] . "</td><td>" . $fila['nombreartistico'] . "</td></tr>";
            else
            echo "ERROR: " . print_r($pdo->errorInfo());
            */
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $stmt->bindColumn(1, $nombre);
            $stmt->bindColumn(2, $dificultad);
            $stmt->bindColumn(3, $tiempo);
            $stmt->bindColumn(4, $chef);
            while ($stmt->fetch(PDO::FETCH_BOUND))
                echo "<tr><td>$nombre</td><td>$dificultad</td><td>$tiempo</td><td>$chef</td></tr>";
            ?>

        </table>
    </div>
</body>

</html>
<?php
unset($stmt);
unset($pdo);
?>