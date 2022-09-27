<HTML>

<HEAD>
    <TITLE>Trabajando con Funciones</TITLE>
</HEAD>

<BODY>
    <CENTER>
        <H2>Funciones de Usuario<I></I></H2>
        <?php
        //https://www.php.net/manual/en/language.variables.scope.php
        $inicio = 9;
        $final = 0;

        function cuentaAtras()
        {

            // variable local
            $inicio = 7;

            // variable global
            global $final;

            /* Una variable estática existe sólo en el ámbito local de la función, 
             * pero no pierde su valor cuando la ejecución del programa abandona este ámbito
             */
            static $num = 0; //La primera vez que se ejecuta la función $num va a valer 0
        
            
// Ver que se puede usar cualquiera de las dos formas del bucle 
//          for (; $inicio > $final; $inicio--)
            for (; $inicio > $GLOBALS['final']; $inicio--)
                echo $inicio, "...<BR>";

            $num++;
            /* Hemos incrementado la variable estática $num y la próxima vez que 
             * llamemos a la función va a recordar el último valor que tenía
             */
            echo "¡ Estamos en la ejecución nº $num !";
        }

        ?>
        <TABLE BORDER="0" CELLPADDING="4" CELLSPACING="6">
            <TR ALIGN="center">
                <TD BGCOLOR="#FFBBAA">
                    <?php
                    cuentaAtras();                    // $num vale 1
                    ?>
                </TD>
                <TD BGCOLOR="#FFFBAD">
                    <?php
                    cuentaAtras();                    // $num vale 2
                    ?>
                </TD>
            </TR>
        </TABLE>
    </CENTER>
</BODY>

</HTML>