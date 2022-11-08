<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['matricula']) || empty($_POST['matricula'])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 5</title>
    <style>
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div>
            <label for="daw">Despliegue de aplicaciones web</label>
            <input type="checkbox" name="matricula[]" id="daw" value="daw">
        </div>
        <div>
            <label for="dwec">Desarrollo web en entorno cliente</label>
            <input type="checkbox" name="matricula[]" id="dwec" value="dwec">
        </div>
        <div>
            <label for="dwes">Desarrollo web en entorno servidor</label>
            <input type="checkbox" name="matricula[]" id="dwes" value="dwes">
        </div>
        <div>
            <label for="diw">Diseño de interfaces web</label>
            <input type="checkbox" name="matricula[]" id="diw" value="diw">
        </div>
        <div>
            <label for="eie">Empresa e iniciativa emprendedora</label>
            <input type="checkbox" name="matricula[]" id="eie" value="eie">
        </div>
        <div>
            <label for="fct">Formación y orientación laboral</label>
            <input type="checkbox" name="matricula[]" id="fct" value="fct">
        </div>
        <input type="submit" value="Matricular">
    </form>
    
</body>
</html>
<?php
    } else {
        $asignaturas = $_POST['matricula'];
        echo "Se han seleccionado las siguientes matrículas: <br>";
        foreach ($asignaturas as $asignatura)
        {
            if(strcmp($asignatura, "daw") == 0)
            {
                echo "Despliegue de aplicaciones web <br>";
            }
            else if(strcmp($asignatura, "dwec") == 0)
            {
                echo "Desarrollo web en entorno cliente <br>";
            }
            else if(strcmp($asignatura, "dwes") == 0)
            {
                echo "Desarrollo web en entorno servidor <br>";
            }
            else if(strcmp($asignatura, "diw") == 0)
            {
                echo "Diseño de interfaces web <br>";
            }
            else if(strcmp($asignatura, "eie") == 0)
            {
                echo "Empresa e iniciativa emprendedora <br>";
            }
            else if(strcmp($asignatura, "fct") == 0)
            {
                echo "Formación y orientación laboral <br>";
            }
        }
    }
?>