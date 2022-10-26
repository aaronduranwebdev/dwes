<?php

/**
 * Función que comprueba si un DNI es válido
 *
 * @author Aarón Durán Novas <aaronduranwebdev@gmail.com>
 * @param string $dni Cadena que contiene el DNI
 * @return int Entero con un código que determina si es válido o si hubo un error en la comprobación
 */
function comprobarDNI(string $dni): int
{
    $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
    if (strlen($dni) == 9)
    {

        $numeros = substr($dni, 0, 8);

        if (is_numeric($numeros))
        {

            $resto = intval($numeros) % 23;

            $letra = $letras[$resto];

            if (strcmp(strtoupper(substr($dni, 8)), $letra) == 0)
            {
                $codigo = 0;
            }
            else
            {
                $codigo = -3;
            }

        }
        else
        {
            $codigo = -2;
        }
    }
    else
    {
        $codigo = -1;
    }
    return $codigo;
}
switch (comprobarDNI("39487118M"))
{
    case '0':
        echo "DNI válido";
        break;
    case '-1':
        echo "Número incorrecto de caracteres";
        break;
    case '-2':
        echo "Los ocho primeros caracteres no son números";
        break;
    case '-3':
        echo "No coincide el número con la letra";


}

?>