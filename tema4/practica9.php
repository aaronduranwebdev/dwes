<?php
// Función que genera checkboxes por cada condición pasada como argumento
function generarCampos(...$condiciones)
{
    foreach ($condiciones as $condicion) {
        echo '<input type="checkbox" id="' . $condicion . '" name="condicion[]" value="' . $condicion . '">';
        echo '<label for="' . $condicion . '">' . ucfirst($condicion) . '</label>';
    }
}
// Función que muestra un array como una lista HTML desordenada
function muestrala($datos)
{
    echo "<ul>";
    foreach ($datos as $dato) {
        echo "<li>" . ucfirst($dato) . "</li>";
    }
    echo "</ul>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $obligatorios = ['ciudad', 'mes', 'año'];
    $error = false;
    foreach ($obligatorios as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            echo "El campo $campo es obligatorio<br>";
            $error = true;
        }
    }
    if (!$error) {
        $ciudad = $_POST['ciudad'];
        $mes = $_POST['mes'];
        $año = $_POST['año'];
        echo "<p>En la ciudad $ciudad del mes $mes y año $año usted observó las siguientes condiciones atmosféricas:<p>";

        muestrala($_POST['condicion']);
        echo "<p>Además de las siguientes condiciones no predefinidas:</p>";
        muestrala(explode(",", $_POST['extra']));
    }
} else {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 9</title>
    <style>
        input:not(input[type='checkbox']),
        textarea {
            display: block;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="ciudad">Ciudad</label><input type="text" name="ciudad" id="ciudad">
        <label for="mes">Mes</label><input type="text" name="mes" id="mes">
        <label for="año">Año</label><input type="text" name="año" id="año">
        <?php generarCampos("soleado", "nublado", "lluvia", "granizo", "aguanieve", "nieve", "viento", "frío"); ?>
        <textarea cols="60" name="extra" id="extra"></textarea>
        <input type="submit" value="Muéstrala">
    </form>
</body>

</html>
<?php
}
?>