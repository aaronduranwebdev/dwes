<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta producto</title>
    <style>
        input {
            display: block;
        }
    </style>
</head>

<body>
    <?php
        include 'funciones.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si se accede a la página con una petición POST
            $camposObligatorios = array('nombreProd', 'fechaProd');
            $vacio = false;
            foreach ($camposObligatorios as $obligatorio){
                if (empty($_POST[$obligatorio])){
                    $vacio = true;
                }
            }
            if ($vacio) {
                echo "Alguno de los campos obligatorios está vacío";
            } else {
                $nombresCategorias = ['bio' => 'BIO', 'fre' => 'FRESCO', 'cong' => 'CONGELADO', 'env' => 'ENVASADO'];
                $nombreProd = sanearDatos($_POST['nombreProd']);
                $descProd = !empty($_POST['descProd']) ? sanearDatos($_POST['descProd']) : 'No hay descripción';
                $precioProd = !empty($_POST['precioProd']) ? sanearDatos($_POST['precioProd']) : 'No hay precio';
                $fechaProd = sanearDatos($_POST['fechaProd']);
                echo "<ul>";
                echo "<li>El producto es: $nombreProd</li>";
                echo "<li>Descripción: $descProd</li>";
                echo "<li>Su precio es: $precioProd</li>";
                echo "<li>Su fecha de fabricación es: $fechaProd</li>";
                echo "<li>Pertenece a las categorías:</li>";
                if (!empty($_POST['catProd'])) {
                    $catProd = $_POST['catProd'];
                    echo "<ol>";
                    foreach ($catProd as $categoria){
                        echo "<li>$nombresCategorias[$categoria]</li>";
                    }
                    echo "</ol>";
                } else {
                    echo "No tiene categorías";
                }
            }
        } else { // Mostramos el formulario

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="nombreProd">Nombre</label><input type="text" name="nombreProd" id="nombreProd"
            value="<?php if (isset($_POST['nombreProd'])) echo $_POST['nombreProd']; ?>">
        <label for="descProd">Descripción</label><input type="text" name="descProd" id="descProd"
            value="<?php if (isset($_POST['descProd'])) echo $_POST['descProd']; ?>">
        <label for="precioProd">Precio</label><input type="text" name="precioProd" id="precioProd"
            value="<?php if (isset($_POST['precioProd'])) echo $_POST['precioProd']; ?>">
        <label for="fechaProd">Fecha de fabricación</label><input type="date" name="fechaProd" id="fechaProd"
            value="<?php if (isset($_POST['fechaProd'])) echo $_POST['fechaProd']; ?>">
        <label for="catProd">Categorías</label>
        <select name="catProd[]" id="catProd" multiple>
            <option value="bio">1. BIO</option>
            <option value="fre">2. FRESCO</option>
            <option value="cong">3. CONGELADO</option>
            <option value="env">4. ENVASADO</option>
        </select>
        <input type="submit" value="Registrar producto">
    </form>
    <?php
        }
    ?>
</body>

</html>