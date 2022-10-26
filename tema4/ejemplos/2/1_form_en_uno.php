<?php
    /* si va bien redirige a principal.php si va mal, mensaje de error */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['usuario'] === "pepe" and $_POST["clave"] === "1234") {
            header("Location: 1_principal.php");
        } else {
            $err = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>		
        <meta charset = "UTF-8">
    </head>
    <body>			
        <?php
            if (isset($err)) {
                echo "<p> Revise usuario y contraseña</p>";
            }
        ?>
        <!--
        htmlspecialchars — Convierte los caracteres especiales a entidades HTML
        -->
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
            <label for = "usuario">Usuario</label> 
            <input value = "<?php if (isset($_POST["usuario"])) echo $_POST["usuario"]; ?>"
                   id = "usuario" name = "usuario" type = "text">	<br>			
            <label for = "clave">Clave</label> 
            <input id = "clave" name = "clave" type = "password"><br>			

            <input type = "submit" value="Enviar">
        </form>
    </body>
</html>