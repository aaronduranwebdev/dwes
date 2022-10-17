<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1 - a21aarondn</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="notaNum" id="notaNum">
        <input type="submit" value="Ver en texto">
    </form>
    <?php
        if(isset($_GET['notaNum'])) {
            $notaNum = $_GET['notaNum'];
            switch ($notaNum) {
                case '10':
                    $notaEscrita = 'Sobresaliente';
                    break;
                case '9':
                    $notaEscrita = 'Sobresaliente';
                default:
                    # code...
                    break;
            }
            echo '<p>La nota es ' . $notaEscrita;
        }
    ?>
</body>

</html>