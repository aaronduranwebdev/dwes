<HTML>
    <HEAD>
        <TITLE>Funciones dentro de funciones</TITLE>
    </HEAD>
    <BODY>
        <?php

//Funcion dentro de una funcion
        function exterior($valor) {
            $aux = 2 * $valor;
            echo interior();
            function interior() {
                $cadena = "Contenido de la variable definida en la función interior\n";
                return $cadena;
            }

            return $aux;
        }

        /* No podemos llamar a la función interior pues no existe. */
        $numero = 2;
        //echo interior(); //Descomentar esta línea para ver el error
        echo exterior($numero) . "<br>";
        
        /* Ahora podemos llamar a la función interior() ya que el procesamiento de la
         * función exterior() la ha hecho accesible */
        //echo interior();
        ?>
    </BODY>

