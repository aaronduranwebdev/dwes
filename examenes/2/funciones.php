<?php
class Funciones
{
    static private $directorioSubidas = 'archivos' . DIRECTORY_SEPARATOR;

    static function camposObligatorios(array $campos, array $array): mixed
    {
        $faltan = [];
        foreach ($campos as $campo) {
            if (empty($array[$campo])) {
                array_push($faltan, $campo);
            }
        }
        if (count($faltan) > 0) {
            $resultado = implode(', ', $faltan);
        } else {
            $resultado = true;
        }
        return $resultado;
    }
    static function validarFechaNac(string $fecha): bool
    {
        if (!empty($fecha)) {
            $tmp = explode("-", $fecha);
            return checkdate($tmp[1], $tmp[2], $tmp[0]);
        } else {
            return false;
        }
    }

    static function sanearCorreo(string $correo): mixed
    {
        $correoSaneado = filter_var($correo, FILTER_SANITIZE_EMAIL);
        return filter_var($correoSaneado, FILTER_VALIDATE_EMAIL) ? $correoSaneado : false;
    }
    static function comprobarNombre(string $cadena): bool
    {
        return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+$/", $cadena);
    }
    /**
     * Función que comprueba que ambas contraseñas coincidan
     * @param string Primera contraseña
     * @param string Segunda contraseña
     * @return bool Coincide la contraseña sí/no
     */
    static function verificarPassword(string $pass1, string $pass2): bool
    {
        return strcmp($pass1, $pass2);
    }
    /**
     * Función que comprueba los errores de subida de los archivos
     * @param mixed Archivo a comprobar
     * @return bool Sin errores sí/no
     */
    private static function comprobar_errores_subida($archivo)
    {
        if (!isset($archivo['error'])) {
            $error = true;
            echo "No hay archivo";
        }
        switch ($archivo['error']) {
            case UPLOAD_ERR_OK:
                $error = false;
                break;
            case UPLOAD_ERR_NO_FILE:
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
            default:
                $error = true;
        }
        return $error;

    }
    /**
     * Función que mueve los archivos temporales a su ubicación correspondiente
     * @param array Array de rutas de los archivos
     * @param string Correo usado para el nombre de la carpeta de destino
     * @return bool Subida correcta sí/no
     */
    static function moverArchivos(array $archivos, string $correo)
    {
        $error = false;
        $carpetaDestino = str_replace(['@', '.'], ['_', '-'], $correo);

        foreach ($archivos as $archivo) {
            if ($archivo['size'] > 100000) {
                $error = true;
                break;
            }
        }
        if (!$error) {
            if (!is_dir(self::$directorioSubidas . $carpetaDestino)) {
                mkdir(self::$directorioSubidas . $carpetaDestino, 0777, true);
            }
            foreach ($archivos as $archivo) {
                $error = self::comprobar_errores_subida($archivo);
                if (!$error) {
                    $error = move_uploaded_file($archivo['tmp_name'], self::$directorioSubidas . $carpetaDestino . DIRECTORY_SEPARATOR . $archivo['name']);
                }
            }
        }
        return $error;
    }
}
?>