<?php

function mostrarColor() {
    return 'Rojo';
}

class Numeros {

    static function mostrarNumero() {
        return "5";
    }

}

echo call_user_func('mostrarColor') . "<br>";  // Muestra rojo

echo call_user_func(array('Numeros', 'mostrarNumero')) . "<br>"; // Muestra 5
// Esta forma de llamar al método es estática.
// Si el método no fuera static, con esta forma generaría un error
// Strict Standards, non-static method should not be called statically
// Llamada a un método estático o no estático:
$numeros = new Numeros;
echo call_user_func(array($numeros, 'mostrarNumero')) . "<br>"; // Muestra 5
// Llamada a un método estático. Nombre de la clase::Nombre método estático
echo call_user_func('Numeros::mostrarNumero') . "<br>"; // Muestra 5
