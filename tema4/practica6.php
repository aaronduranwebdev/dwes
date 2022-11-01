<?php
// Función que comprueba si un número es primo
function esPrimo($numero)
{
    $primo = true;
    for ($i = 2; $i < $numero; $i++)
    {
        if ($numero % $i == 0)
        {
            $primo = false;
        }
    }
    return $primo;
}
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
    <?php
    if (!isset($_POST['numeros']) || (isset($_POST['numeros']) && empty($_POST['numeros'])))
    {
    ?>
    <form action="practica6.php" method="post">
        <div>
            <label for="numeros">Números a comprobar (separados por comas)</label>
            <input type="text" name="numeros" id="numeros" value="">
        </div>
        <input type="submit" value="Comprobar">
    </form>
    <?php
    }
    else
    {
        $numeros = explode(',', $_POST['numeros']);
        foreach ($numeros as $numero)
        {
            if (intval($numero) != 0 && esPrimo(intval($numero)))
            {
                echo $numero . " es primo <br>";
            }
        }
    }
    ?>
</body>

</html>