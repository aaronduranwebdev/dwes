<?php
// Se inicia siempre la sesión para poder trabajar con el array superglobal $_SESSION
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['borrarSesion'])) {
        session_unset();
        session_destroy();
    }
    if (isset($_POST['nuevoTexto'])) {
        $_SESSION['texto'][] = $_POST['nuevoTexto'];
    }
}
if (isset($_SESSION['texto'])) {
    var_dump($_SESSION['texto']);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
    <style>
        #wrapper {
            display: flex;
            gap: 5px;
            width: 350px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <fieldset>
                <label for="nuevoTexto">Texto</label>
                <input type="text" name="nuevoTexto" id="nuevoTexto">
            </fieldset>
            <fieldset>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <fieldset>
                <input type="hidden" name="borrarSesion">
                <input type="submit" value="Borrar sesión">
            </fieldset>
        </form>
    </div>
</body>

</html>