<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipoAlta'];
    if ($tipo === 'altaProducto'){
        header('Location:producto.php');
    } else if ($tipo === 'altaServicio') {
        header('Location:servicio.php');
    } else {
        echo "No es un valor válido";
    }
} else {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta producto/servicio</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p>¿Qué tipo de alta deseas realizar?</p>
        <label for="altaProducto">Producto</label><input type="radio" name="tipoAlta" id="altaProducto" value="altaProducto">
        <label for="altaServicio">Servicio</label><input type="radio" name="tipoAlta" id="altaServicio" value="altaServicio">
        <input type="submit" value="Continuar">
    </form>
</body>

</html>
<?php
}
?>