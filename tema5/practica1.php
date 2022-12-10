<?php
var_dump($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <style>
        input {
            display: block;
        }
        div {
            border: 1px solid gray;
        }
        #wrapper{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="nombreCookie">Nombre:</label>
            <input type="text" name="nombreCookie" id="nombreCookie">
            <label for="valorCookie">Valor:</label>
            <input type="text" name="valorCookie" id="valorCookie">
            <label for="segundos">Segundos de permanencia</label>
            <input type="number" name="segundos" id="segundos">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>