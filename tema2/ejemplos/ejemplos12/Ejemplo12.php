<?php
// Programa que muestra por pantalla todos los valores que hay en un array anidado

declare (strict_types= 1);
$num_llamadas=0;

//function verValores($arr_entrada) {
function verValores(array $arr_entrada):array {
/* Recibe un array $arr_entrada con múltiples niveles
 * Devuelve un array asociativo ['total','valores'] cuyo primer elemento es el 
 * número de elementos que contiene el array de entrada y el segundo es un array
 * de una dimensión, donde se van situando todos los valores del $arr_entrada
 */
    
// referencia a las variables globales
    global $num_llamadas;
    $num_llamadas++;

    static $salida=array();
    static $ctr=0;

    if (!is_array($arr_entrada)) {      // comprobar que es un array
        die('ERROR: el argumento no es un array');
    }

    foreach ($arr_entrada as $a) { // itera sobre el array:
        if (is_array($a)) {     // if es un array, llama a función 
            verValores($a);     // llamada recursiva
        } else {        // si el contenido no es un array, 
            $salida[] = $a;    // añade el valor al array de salida
            $ctr++;          // incrementa por cada valor encontrado
        }
    }
    // devuelve contador y array de valores encontrados 
    return array('total' => $ctr, 'valores' => $salida);
}

// define un array anidado
$datos = array(
    'o' => array(
        'oasis',
        'objeto',
        'oso'),
    't' => array(
        'te',
        'teatro',
        'toro',
        'milcinco' => array(
            array('mil', 'cinco'),
            array('one thousand', 'five', array(
                    'cielo' => 'rojo',
                    'sangre' => 'azul'
                ))
        )
    )
);

// cuenta y muestra valores en un array anidado
$ret = verValores($datos);
echo $ret['total'] . ' valores encontrados: ';
echo implode(', ', $ret['valores']); //Poner un breakpoint aquí para ver la estructura del array
echo "<br> Se llamó a la función verValores $num_llamadas veces.";
?>
