<?php
function procesarColor()
{
    if (isset($_POST['colorR']) && isset($_POST['colorG']) && isset($_POST['colorB'])) {
        if (is_numeric($_POST['colorR']) && is_numeric($_POST['colorG']) && is_numeric($_POST['colorB'])) {
            if ($_POST['colorR'] >= 0 && $_POST['colorR'] <= 255 && $_POST['colorG'] >= 0 && $_POST['colorG'] <= 255 && $_POST['colorB'] >= 0 && $_POST['colorB'] <= 255) {
                $colorR = $_POST['colorR'];
                $colorG = $_POST['colorG'];
                $colorB = $_POST['colorB'];
                $color = "rgb($colorR, $colorG, $colorB)";
                return $color;
            } else {
                return "rgb(255,255,255)";
            }
        } else {
            return "rgb(0,0,0)";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 3</title>
    <style>
        body {
            background-color: <?php echo procesarColor();
            ?>;
        }
    </style>
</head>

<body>

</body>

</html>
<?php
} else {
    echo "No se ha procesado ningún color";
}
?>