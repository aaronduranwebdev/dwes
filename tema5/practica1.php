<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['borrarCookies'])) {
        foreach ($_COOKIE as $nombre => $valor) {
            setcookie($nombre, $valor, time() - 3600);
        }
        $estaPagina = $_SERVER['PHP_SELF'];
        header("Location: $estaPagina");
    }
    if (isset($_POST['nombreCookie']) && isset($_POST['valorCookie'])) {
        $nombre = $_POST['nombreCookie'];
        $valor = $_POST['valorCookie'];
        if (isset($_POST['segundosPermanencia']) && !empty($_POST['segundosPermanencia'])) {
            $segundosPermanencia = $_POST['segundosPermanencia'];
            setcookie($nombre, $valor, time() + intval($segundosPermanencia));
        } else {
            setcookie($nombre, $valor);
        }
        
    }
}
var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <style>
        #wrapper {
            display: flex;
            gap: 5px;
        }

        .caja {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 200px;
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div class="caja">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div>
                    <label for="nombreCookie">Nombre:</label>
                    <input type="text" name="nombreCookie" id="nombreCookies">
                </div>
                <div>
                    <label for="valorCookie">Valor:</label>
                    <input type="text" name="valorCookie" id="valorCookie">
                </div>
                <div>
                    <label for="segundosPermanencia">Segundos de permanencia:</label>
                    <input type="text" name="segundosPermanencia" id="segundosPermanencia">
                </div>
                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>

        <div class="caja">
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="hidden" name="borrarCookies">
                    <input type="submit" value="Borrar cookies">
                </form>
            </div>
        </div>
    </div>

</body>

</html>