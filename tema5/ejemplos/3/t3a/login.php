<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login / Registro de usuarios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            .info {
                width: 280px;
                margin: 20px auto;
                border: solid 1px;
                padding: 10px;
            }

            .forms {
                width: 100%;
                overflow: hidden;
            }
            .form_login {
                width: 300px;
                float: left;
                margin-left: 80px;
            }
            .form_registro {
                width: 300px;
                float: right;
                margin-right: 80px;
            }

            .desactivado {
                visibility: hidden;
            }

            input[type=text], input[type=password] {
                width: 60%;
                display: block;
            }

        </style>    
    </head>
    <body>
        <div class="info">
            <?php
            if (empty($_SESSION['nombre_usuario']))
                echo '<h2>No logueado</h2>';
            else {
                echo '<h2>Usuario ' . $_SESSION['nombre_usuario'] . ' logueado</h2>';
                ?>
                <form method='post' action='do_login.php'>
                    <input type="hidden" name="logout" value="1" />
                    <input type="submit" id="submit-logout" value="Log out" />
                </form>     
                <?php
            }
            ?>
        </div>
        <div class="forms">
            <div class="form_login<?php if (!empty($_SESSION['nombre_usuario'])) echo ' desactivado'; ?>" >
                <form method='post' action='do_login.php'>
                    <h3>Usuario existente:</h3>
                    <fieldset>
                        <label for="nombreusuario">Nombre:</label>
                        <input id="nombreusuario" type="text" name="nombreusuario" />
                        <label for="contrasenha">Contrasinal:</label>
                        <input id="contrasenha" type="password" name="contrasenha" />
                    </fieldset>
                    <fieldset>
                        <input type="submit" id="submit-login" value="Log in" />           
                    </fieldset>
                </form>
            </div>
            <div class="form_registro">
                <form method='post' action='do_login.php'>
                    <h3>Nuevo usuario:</h3>
                    <fieldset>
                        <label for="nombreusuario2">Nombre:</label>
                        <input id="nombreusuario2" type="text" name="nombreusuario" />
                        <label for="nuevacontrasenha">Contrase??a:</label>
                        <input id="nuevacontrasenha" type="password" name="contrasenha" />
                        <label for="nuevacontrasenha2">Repita la contrase??a:</label>
                        <input id="nuevacontrasenha2" type="password" name="contrasenha2" />
                    </fieldset>
                    <fieldset>
                        <input type="submit" value="Registrar" />
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
