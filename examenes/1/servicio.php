<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta servicio</title>
    <style>
        input {
            display: block;
        }
    </style>
</head>

<body>
    <?php
        include 'funciones.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $camposObligatorios = array('codigoSvc', 'nombreSvc', 'fechaSvc');
            $vacio = false;
            foreach ($camposObligatorios as $obligatorio){
                if (empty($_POST[$obligatorio])){
                    $vacio = true;
                }
            }
            if (empty($_FILES['imgSvc']['size'])){
                $vacio = true;
            }
            if ($vacio) {
                echo "Alguno de los campos obligatorios está vacío";
            } else {
                $codigoSvc = sanearDatos($_POST['codigoSvc']);
                $nombreSvc = sanearDatos($_POST['nombreSvc']);
                $descSvc = !empty($_POST['descSvc']) ? sanearDatos($_POST['descSvc']) : 'No hay descripción';
                $fechaSvc = sanearDatos($_POST['fechaSvc']);
                echo "<ul>";
                echo "<li>El servicio es: $nombreSvc</li>";
                echo "<li>Descripción: $descSvc</li>";
                echo "<li>Su fecha de comienzo es: $fechaSvc</li>";
                echo "</ul>";
                $imagen = guardarArchivo($codigoSvc, $_FILES['imgSvc']);
                if ($imagen) {
                    echo "Se ha procesado la imagen del servicio";
                } else {
                    echo "No se ha procesado la imagen";
                }
                // Falta completar esta función
                /*if (!empty($_FILES['imgSvc'])) {
                    procesarArchivos($_FILES['fichSvc']);
                }*/
                
            }
        } else { // Mostramos el formulario

    ?>
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="codigoSvc">Código</label><input type="text" name="codigoSvc" id="codigoSvc"
            value="<?php if (isset($_POST['codigoSvc'])) echo $_POST['codigoSvc']; ?>">
        <label for="nombreSvc">Nombre</label><input type="text" name="nombreSvc" id="nombreSvc"
            value="<?php if (isset($_POST['nombreSvc'])) echo $_POST['nombreSvc']; ?>">
        <label for="descSvc">Descripción</label><input type="text" name="descSvc" id="descSvc"
            value="<?php if (isset($_POST['descSvc'])) echo $_POST['descSvc']; ?>">
        <label for="fechaSvc">Fecha de comienzo</label><input type="date" name="fechaSvc" id="fechaSvc"
            value="<?php if (isset($_POST['fechaSvc'])) echo $_POST['fechaSvc']; ?>">
        <label for="imgSvc">Imagen</label><input type="file" name="imgSvc" id="imgSvc">
        <label for="fichSvc">Ficheros</label><input type="file" name="fichSvc[]" id="fichSvc" multiple><br>
        <input type="submit" value="Registrar servicio">
    </form>
    <?php
        }
    ?>
</body>

</html>