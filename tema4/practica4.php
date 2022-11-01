<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>

<body>
    <?php
    if (!isset($_POST['notas'])) {
    ?>
    <form action="practica4.php" method="post">
        <input type="text" name="notas" id="notas">
        <input type="submit" value="Calcular">
    </form>
    <?php
    
    } else {
        $numeros = explode(' ', $_POST['notas']);
        $suma = 0;
        $suspensos = 0;
        $sobresalientes = 0;
        $contador = 0;
        foreach ($numeros as $numero)
        {
            if (floatval($numero) >= 0 && floatval($numero) <= 10)
            {
                $suma += floatval($numero);
                if(floatval($numero) < 5)
                {
                    $suspensos++;
                }
                else if(floatval($numero) >= 9)
                {
                    $sobresalientes++;
                }
                $contador++;
            }
        }
        echo "La media de $contador alumnos es: " . $suma / $contador . "<br>";
        echo "Hay $suspensos suspensos y $sobresalientes sobresalientes";
    }
    ?>
</body>

</html>