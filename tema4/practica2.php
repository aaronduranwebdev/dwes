<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="nombre">Nombre:</label> <input type="text" name="nombre" id="nombre">
            <label for="direccion">Dirección:</label> <input type="text" name="direccion" id="direccion">
        </div>
        <div>
            <label for="edad">Edad:</label> <input type="number" name="edad" id="edad" min="12" max="90">
        </div>
        <label for="profesion">Profesión:</label> <input type="text" name="profesion" id="profesion">
        <div>
            <label for="residente">¿Residente?</label>
            <input type="radio" name="residente" id="residente" value="resSi">Sí</input>
            <input type="radio" name="residente" id="residente" value="resNo">No</input>
        </div>
        <input type="submit" value="Registrarse">

    </form>
    <?php
        if (isset($_POST['nombre']))
        {
            if (is_string($_POST['nombre'])) {
                echo $_POST['nombre'];
            } else{
                echo "Introduce un valor válido (string)";
            }
        }

    ?>
</body>

</html>