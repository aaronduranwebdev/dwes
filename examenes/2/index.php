<?php
include 'funciones.php';

$pagina = htmlspecialchars($_SERVER['PHP_SELF']);

$camposLogin = ['loginCorreo', 'loginPass'];
$camposRegistro = ['registroNombre', 'registroFechaNac', 'registroCorreo', 'registroPass', 'registroVeriPass'];

$loginCorreo = isset($_POST['loginCorreo']) ? Funciones::sanearCorreo($_POST['loginCorreo']) : '';
$loginPass = isset($_POST['loginPass']) ? $_POST['loginPass'] : '';

$registroNombre = (isset($_POST['registroNombre']) && Funciones::comprobarNombre($_POST['registroNombre'])) ? $_POST['registroNombre'] : '';
$registroApellidos = (isset($_POST['registroApellidos']) && Funciones::comprobarNombre($_POST['registroApellidos'])) ? $_POST['registroApellidos'] : '';
$registroFechaNac = (isset($_POST['registroFechaNac']) && Funciones::validarFechaNac($_POST['registroFechaNac'])) ? $_POST['registroFechaNac'] : '';
$registroCorreo = (isset($_POST['registroCorreo'])) ? Funciones::sanearCorreo($_POST['registroCorreo']) : '';
$registroPass = isset($_POST['registroPass']) ? $_POST['registroPass'] : '';
$registroVeriPass = isset($_POST['registroVeriPass']) ? $_POST['registroVeriPass'] : '';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            gap: 15px;
            justify-content: center;
            align-items: center;
        }

        .caja {
            width: 40%;
        }

        form {
            padding: 5px;
            border: 1px solid #000;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form div {
            display: flex;
            flex-direction: column;

        }

        form .requerido {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Formulario de login -->
    <div class="caja">
        <h1>Iniciar sesi??n</h1>
        <?php
        // Campos a comprobar
        $comprobar = array(
            'loginCorreo' => $loginCorreo,
            'loginPass' => $loginPass
        );
        $obligatorios = Funciones::camposObligatorios($camposLogin, $comprobar);
        if (!isset($_POST['iniciarSesion']) || (isset($_POST['iniciarSesion']) && is_string($obligatorios))) {
        ?>
        <form action="<?php echo $pagina; ?>" method="post">
            <div>
                <label for="loginCorreo">Correo electr??nico</label>
                <input type="text" name="loginCorreo" id="loginCorreo"
                    value="<?php echo htmlspecialchars($loginCorreo); ?>">
            </div>

            <div>
                <label for="loginPass">Contrase??a</label>
                <input type="password" name="loginPass" id="loginPass"
                    value="<?php echo htmlspecialchars($loginPass); ?>">

            </div>
            <div>
                <input type="submit" name="iniciarSesion" value="Iniciar sesi??n">
            </div>
            <?php
            if (!empty($_POST['iniciarSesion']) && $obligatorios !== true) {
                $obligatorios = str_replace('loginCorreo', 'correo electr??nico', $obligatorios);
                $obligatorios = str_replace('loginPass', 'contrase??a', $obligatorios);
                echo "<div><p \"requerido\">Faltan campos obligatorios: $obligatorios</p></div>";
            }
            ?>
        </form>
        <?php
        } else {
            echo "Correo electr??nico: $loginCorreo<br>";
            echo "Contrase??a: $loginPass";
        }
        ?>
    </div>

    <!-- Formulario de registro -->
    <div class="caja">
        <h1>Registrarse</h1>
        <?php
        $comprobar = array(
            'registroNombre' => $registroNombre,
            'registroFechaNac' => $registroFechaNac,
            'registroCorreo' => $registroCorreo,
            'registroPass' => $registroPass,
            'registroVeriPass' => $registroVeriPass
        );
        $obligatorios = Funciones::camposObligatorios($camposRegistro, $comprobar);
        if (!isset($_POST['registrarse']) || (isset($_POST['registrarse']) && is_string($obligatorios))) {
        ?>
        <form enctype="multipart/form-data" action="<?php echo $pagina; ?>" method="post">
            <div>
                <label for="registroNombre">Nombre</label>
                <input type="text" name="registroNombre" id="registroNombre"
                    value="<?php echo htmlspecialchars($registroNombre); ?>">

            </div>
            <div>
                <label for="registroApellidos">Apellidos</label>
                <input type="text" name="registroApellidos" id="registroApellidos"
                    value="<?php echo htmlspecialchars($registroApellidos); ?>">

            </div>
            <div>
                <label for="registroFechaNac">Fecha de nacimiento</label>
                <input type="date" name="registroFechaNac" id="registroFechaNac"
                    value="<?php echo htmlspecialchars($registroFechaNac); ?>">

            </div>
            <div>
                <label for="registroCorreo">Correo electr??nico</label>
                <input type="text" name="registroCorreo" id="registroCorreo"
                    value="<?php echo htmlspecialchars($registroCorreo); ?>">

            </div>
            <div>
                <label for="registroPass">Contrase??a</label>
                <input type="password" name="registroPass" id="registroPass">

            </div>
            <div>
                <label for="registroVeriPass">Confirma la contrase??a</label>
                <input type="password" name="registroVeriPass" id="registroVeriPass">
            </div>

            <div>
                <label for="registroFicheros">Archivos (m??x. 3)</label>
                <input type="file" name="registroFicheros1">
                <input type="file" name="registroFicheros2">
                <input type="file" name="registroFicheros3">
            </div>


            <div><input type="submit" name="registrarse" value="Registrarse"></div>
            <?php
            if (!empty($_POST['registrarse']) && $obligatorios !== true) {
                $obligatorios = str_replace('registroNombre', 'nombre', $obligatorios);
                $obligatorios = str_replace('registroFechaNac', 'fecha de nacimiento', $obligatorios);
                $obligatorios = str_replace('registroCorreo', 'correo electr??nico', $obligatorios);
                $obligatorios = str_replace('registroPass', 'contrase??a', $obligatorios);
                $obligatorios = str_replace('registroVeriPass', 'confirmaci??n de contrase??a', $obligatorios);
                echo "<div><p class=\"requerido\">Faltan campos obligatorios: $obligatorios</p></div>";
            }
            ?>
        </form>
        <?php
        } else {
            $error = false;
            $mensajeError = '';
            if (!Funciones::comprobarNombre($registroNombre)) {
                $error = true;
                $mensajeError .= "El nombre contiene caracteres no v??lidos<br>";
            }
            if (!empty($registroApellidos) && !Funciones::comprobarNombre($registroApellidos)) {
                $error = true;
                $mensajeError .= "Los apellidos contienen caracteres no v??lidos<br>";
            }
            if (!Funciones::sanearCorreo($registroCorreo)) {
                $error = true;
                $mensajeError .= "El correo electr??nico no es v??lido<br>";
            }
            if (Funciones::verificarPassword($registroPass, $registroVeriPass) != 0) {
                $error = true;
                $mensajeError .= "Las contrase??as no coinciden<br>";
            }
            if (!Funciones::validarFechaNac($registroFechaNac)) {
                $error = true;
                $mensajeError .= "La fecha de nacimiento no es v??lida<br>";
            }
            if (!$error) {
                if (!Funciones::moverArchivos($_FILES, $registroCorreo)) {
                    $error = true;
                    $mensajeError .= "No se han podido cargar los archivos";
                }
            }
            if (!$error) {
                $fechaNacimiento = explode('-', $registroFechaNac);
                echo "Datos de registro:<br>Nombre: $registroNombre<br>Apellidos: $registroApellidos<br>"
                    . "Fecha de nacimiento: $fechaNacimiento[2]-$fechaNacimiento[1]-$fechaNacimiento[0]<br>"
                    . "Correo electr??nico: $registroCorreo<br>Contrase??a: $registroPass";
            } else {
                echo $mensajeError;
            }
        }
        ?>

    </div>

</body>

</html>