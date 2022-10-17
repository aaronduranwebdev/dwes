<!--
Formulario que calcula el dinero que un particular posee en acciones. 
Solicita que introduzca el nombre, apellido1, apellido2, un campo desplegable 
donde me muestra las acciones que disponibles (accion1, accion2,…, accion5) y un 
campo de texto donde se escribe el número de acciones.
Los campos obligatorios que debe escribir el usuario son su nombre, 
el desplegable de acciones y el número de acciones. 
Crea un array de tasa de cambio con valores inventados.
El procesamiento del formulario se debe hacer en el mismo fichero y debes emplear 
una función calculo_dinero_acciones, creada en otro fichero
Comprobaciones a realizar:
•	Que se hayan escrito los campos obligatorios y si no es así nos vuelva a
        pedir la introducción de los campos que faltan. Los campos ya rellenados
        no hace falta que los vuelva a pedir

Si los datos son correctos nos saluda mostrando un mensaje similar al siguiente:
“Estimado Sr/Sra Diego Pérez Martínez el importe total de dinero que tiene en 
las 5 acciones Accion3 es de 25,5€ a un tipo de cambio 5,1€/acción”.

Nota: Las cantidades expresadas en Euros sólo pueden tener dos decimales.

!-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * Imprimo el formulario si es la primera vez que ejecuto el fich (!isset($_POST["enviar"])
         * o no es la primera vez que ejecuto el fichero (isset($_POST["enviar"]) pero 
         * o el campo nombre o el número de acciones están vacíos.
         */
        if (!isset($_POST["enviar"]) ||
                (isset($_POST["enviar"]) && (empty($_POST['nombre']) || empty($_POST['numeroAcciones']))
                )
        ) {
            ?>
            <!-- Defino el formulario -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p>Nombre <br /><input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'] ?>"/></p>
                <p>Apellido1 <br /><input type="text" name="apellido1" value="<?php if (isset($_POST['apellido1'])) echo $_POST['apellido1'] ?>"/></p> 
                <p>Apellido2 <br /><input type="text" name="apellido2" value="<?php if (isset($_POST['apellido2'])) echo $_POST['apellido2'] ?>"/></p> 
                <p>Accion <br />
                    <select name="accion">
                        <option value="accion1" selected="selected">Acción 1</option>
                        <!-- Al poner la primera opción seleccionada, siempre va a tener este campo un valor
                        haciendo que el desplegable de acciones sea obligatorio
                        -->
                        <option value="accion2" >Acción 2</option>
                        <option value="accion3" >Acción 3</option>
                        <option value="accion4" >Acción 4</option>
                        <option value="accion5" >Acción 5</option>
                    </select>
                <p>Numero de acciones <br /><input type="text" name="numeroAcciones" value="<?php if (isset($_POST['numeroAcciones'])) echo $_POST['numeroAcciones'] ?>"/></p>
                <p><input type="submit" value="Enviar" name="enviar"/></p>
            </form> 

            <?php
        } else {

//Probar con require e include para ver las diferencias que se producen entre ambos
//            require 'funciones.php';
            include 'funciones.php';
            
            /*
             * require es idéntico a include pero produce un error de nivel E_COMPILE_ERROR fatal.
             * Es decir, para la ejecución del script mientras que include sólo emite un warning 
             * (E_WARNING) que permite la ejecución del fichero.
             */

//Defino el array de las acciones (como no lo especifican, pongo unos valores cualquiera)
            $arrayAcciones["accion1"] = 1.356;
            $arrayAcciones["accion2"] = 2.4566;
            $arrayAcciones["accion3"] = 3.2455;
            $arrayAcciones["accion4"] = 4.65781;
            $arrayAcciones["accion5"] = 5.4665;

//Obtengo los valores del formulario y lo asigno a variables
            $nombre = trim($_POST["nombre"]);
            $apellido1 = trim($_POST["apellido1"]);
            $apellido2 = trim($_POST["apellido2"]);
            $accion = $_POST["accion"];
            $numeroAcciones = trim($_POST["numeroAcciones"]);

            echo "Bienvenido señor/a " . $nombre . " " . $apellido1 . " " . $apellido2 . "<br />";
            echo "El valor total de sus " . $numeroAcciones . " acciones, tras solicitar la " . $accion . " es de ";
            printf("%0.2f", calculo_dinero_acciones($accion, $arrayAcciones, $numeroAcciones));
            echo" € a un tipo de " . $arrayAcciones[$accion] . "€/accion";
        }
        ?>

    </body>
</html>
