<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' || (!isset($_POST['fechaNac']) || empty($_POST['fechaNac']))) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="date" name="fechaNac" id="fechaNac">
        <input type="submit" value="Calcular edad">
    </form>

</body>

</html>

<?php

} else {
    $fecha = explode('-', $_POST['fechaNac']);
    if (checkdate($fecha[1], $fecha[2], $fecha[0])) {
        $actual = time();
        echo $actual."<br>";
        $diferencia = $actual - strtotime($_POST['fechaNac']);
        echo $diferencia."<br>";
        echo sprintf('%d años', floor($diferencia / 31556926));
    } else {
        echo "La fecha no es válida";
    }
}
?>