<HTML>
    <HEAD>
        <TITLE>Trabajando con Funciones</TITLE>
    </HEAD>
    <BODY>
    <CENTER>
        <H2>Funciones de Usuario<I></I></H2>
        <?php
        $mifinal = 0;

        function cuentaAtras($inicio, &$fin, $mensaje = "¡ Hemos llegado al final !") {
            for (; $inicio > $fin; $inicio--)
                echo $inicio, "...<BR>";
            $fin = $fin + 2;
            echo $mensaje;
        }
        ?>
        <TABLE BORDER="0" CELLPADDING="4" CELLSPACING="6">
            <TR ALIGN="center">
                <TD BGCOLOR="#FFBBAA">
                    <?php
//Ejecutarlo paso a paso para ver que las variables se incluyen aunque estén en otro bloque distinto

// $mifinal vale 0
                    
                    cuentaAtras(6, $mifinal);
// Tras la ejecución por primera vez de la funión $mifinal vale 2 (este parámetro
// es el que pasamos cuando llamamos a la función cuentaAtras
                    ?>
                </TD>
                <TD BGCOLOR="#FFFBAD">
                    <?php
                    // $mifinal vale 2
                    cuentaAtras(8, $mifinal, "¡ Es el último elemento !");
                    // $mifinal vale 4
                    ?>
                </TD>
            </TR>
        </TABLE>
    </CENTER>
</BODY>
</HTML>
