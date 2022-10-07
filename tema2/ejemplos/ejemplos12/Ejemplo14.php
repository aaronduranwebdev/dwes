<HTML>
    <HEAD>
        <TITLE>Variables de funciones</TITLE>
    </HEAD>
    <BODY>
        <?php

        function primera() {
            echo "En la función primera()<br>\n";
        }

        function segunda($arg = '') {
            echo "En la función segunda(); el argumento es '$arg'.<br>\n";
        }

// Esta es una función envoltorio sobre echo
        function envoltorio($string) {
            echo $string;
        }

        $func = 'primera';
        $func();        // Llama a primera()
        $func = 'segunda';
        $func('test');  // Llama a segunda()
        $func = 'envoltorio';
        $func('test');  // Llama a envoltorio()
        ?>

    </BODY>
