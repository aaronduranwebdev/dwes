<?php
function sanearDatos($datos)
{
    $resultado = trim($datos);
    $resultado = stripslashes($resultado);
    $resultado = htmlspecialchars($resultado);
    return $resultado;
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST['nombre']))
            echo $_POST['nombre']; ?>">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion">
        </div>
        <div>
            <label for="edad">Edad:</label> <input type="number" name="edad" id="edad" min="12" max="90" value="<?php if (isset($_POST['edad']))
            echo $_POST['edad']; ?>">
        </div>
        <label for="profesion">Profesión:</label> <input type="text" name="profesion" id="profesion">
        <div>
            <label for="residente">¿Residente?</label>
            <input type="radio" name="residente" id="residente" value="resSi">Sí</input>
            <input type="radio" name="residente" id="residente" value="resNo">No</input>
        </div>
        <input type="submit" value="Registrarse" name="enviar">

    </form>
    <?php
    } else {
        $obligatorios = array('nombre', 'direccion', 'edad', 'profesion', 'residente');
        $error = false;
        foreach ($obligatorios as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "El campo $campo es obligatorio<br>";
                $error = true;
            }
        }
        if (!$error) {
            $nombre = sanearDatos($_POST['nombre']);
            $direccion = sanearDatos($_POST['direccion']);
            $edad = sanearDatos($_POST['edad']);
            $profesion = sanearDatos($_POST['profesion']);
            if (strcmp(sanearDatos($_POST['residente']), 'resSi') == 0) {
                $residente = 'Sí';
            } else {
                $residente = 'No';
            }
            echo "Nombre: $nombre<br>";
            echo "Dirección: $direccion<br>";
            echo "Edad: $edad<br>";
            echo "Profesión: $profesion<br>";
            echo "Residente: $residente<br>";
        }
    }

    ?>
</body>

</html>