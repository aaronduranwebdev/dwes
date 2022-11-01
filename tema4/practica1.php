<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1 - a21aarondn</title>
</head>

<body>

    <?php
    if (!isset($_POST['notaNum']) || (isset($_POST['notaNum']) && empty($_POST['notaNum']))) 
    {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="notaNum" id="notaNum">
        <input type="submit" value="Ver en texto">
    </form>
    <?php
    }
    else
    {
        if (!empty($_POST['notaNum'])){
        $notaNum = $_POST['notaNum'];
        $resultado = match (intval($notaNum))
            {
            0, 1, 2, 3, 4 => "Suspenso",
            5, 6 => "Aprobado",
            7, 8 => "Notable",
            9, 10 => "Sobresaliente",
            default => "Nota no válida"
            };
            echo '<p>La nota es ' . $resultado . '</p>';
        }
    }
    ?>
</body>

</html>