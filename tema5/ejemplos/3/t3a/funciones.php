<?php

defined('FICH') ? null : define('FICH', __DIR__ . '/usuarios.txt');

function guarda_usuario($nombre, $contrasenha, $contrasenha2) {
    try {
        // Comprobamos que las contraseñas sean iguales
        if ($contrasenha !== $contrasenha2)
            throw new RuntimeException('Las contraseñas no coinciden');

        // Comprobamos que no exista ya ese nombre de usuario
        if (hash_usuario($nombre))
            throw new RuntimeException('El nombre de usuario ya existe');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
        exit();
    }

    // Registramos al nuevo usuario
    $hash = password_hash($contrasenha, PASSWORD_DEFAULT);
    $texto = $nombre . PHP_EOL . $hash . PHP_EOL;
    try {
        $bandera = FALSE;
        $f = fopen(FICH, 'a+');
        if (fwrite($f, $texto))
            $bandera = TRUE;
        fclose($f);
        return $bandera;
    } catch (RuntimeException $e) {
        echo $e->getMessage();
        exit();
    }
}

function hash_usuario($nombre) {
    @$f = fopen(FICH, 'r');
    if ($f) {
        while (!feof($f)) {
            $txt = trim(fgets($f));
            if ($nombre == $txt) {
                $hash = trim(fgets($f));
                fclose($f);
                return $hash;
            }
            fgets($f);
        }
    }
    return false;
}

function verifica_usuario($nombre, $contrasenha) {
    $hash_guardado = hash_usuario($nombre);
    if ($hash_guardado && password_verify($contrasenha, $hash_guardado))
        return true;
    else
        return false;
}

?>
