<?php
// Función que comprueba si un número es primo
function esPrimo($numero)
{
    $primo = true;
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $primo = false;
        }
    }
    return $primo;
}
// Comprobamos que el método de envío sea POST. Si no es así, muestra el formulario.
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['numeros']) || empty($_POST['numeros'])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
    <style>
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="numeros">Números a comprobar (separados por comas)</label>
            <input type="text" name="numeros" id="numeros" value="">
        </div>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>
<?php
} else {
    $numeros = explode(',', htmlspecialchars($_POST['numeros']));
    foreach ($numeros as $numero) {
        if (is_numeric($numero) && esPrimo(intval($numero))) {
            echo $numero . " es primo <br>";
        }
    }
}
?>