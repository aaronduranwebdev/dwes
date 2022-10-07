<HTML>
    <HEAD>
        <TITLE>Trabajando con Funciones</TITLE>
    </HEAD>
    <BODY>
    <CENTER>
        <H2>Funciones de Usuario<I></I></H2>
        <?php

        function factorial_recursivo($numero) {
            if ($numero == 1)
                return 1;
            return $numero * factorial_recursivo($numero - 1);
        }

        function factorial_no_recursivo($numero) {
            echo "$numero! = ";
            for ($factorial = 1; $numero > 1; $numero--) {
                $factorial *= $numero;
                echo "$numero x ";
            }
            echo "1 = $factorial";
            return $factorial;
        }
        ?>
        <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
            <TR ALIGN="center" BGCOLOR="YELLOW">
                <TD>F. Recursiva</TD>
                <TD>Función No Recursiva</TD>
            </TR>
            <TR ALIGN="center">
                <TD><?php echo factorial_recursivo(3); ?></TD>
                <TD><?php factorial_no_recursivo(3); ?></TD>
            </TR>
            <TR ALIGN="center">
                <TD><?php echo factorial_recursivo(4); ?></TD>
                <TD><?php factorial_no_recursivo(4); ?></TD>
            </TR>
            <TR ALIGN="center">
                <TD><?php echo factorial_recursivo(5); ?></TD>
                <TD><?php factorial_no_recursivo(5); ?></TD>
            </TR>
        </TABLE>
    </CENTER>
</BODY>
</HTML>
