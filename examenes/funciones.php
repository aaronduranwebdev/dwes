<?php
    // Función que guarda un archivo en el servidor
    function guardarArchivo($nombre, $fichero){
        switch ($fichero['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No se ha enviado ningún archivo.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('El tamaño del archivo excede el permitido.');
            default:
                throw new RuntimeException('Error desconocido.');
        }
        // Comprobamos el tamaño del archivo
        if ($fichero['size'] > 5000000) {
            throw new RuntimeException('El tamaño del archivo excede el permitido.');
        }
        // Comprobamos el tipo MIME del archivo
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $extensiones = array('jpg' => 'image/jpeg', 'png' => 'image/png', 'pdf' => 'application/pdf');
        $ext = array_search(finfo_file($finfo, $fichero['tmp_name']), $extensiones);
        // Importante cerrar el recurso
        finfo_close($finfo);
        // Comprobamos la extensión del archivo, si no es correcta se lanza una excepción
        if ($ext === false) {
            throw new RuntimeException('El archivo no es una imagen.');
        }
        // Comprobamos si existe el directorio, si no existe se crea
        if (!file_exists('./archivos')) {
            mkdir('./archivos');
        }
        $nombreArchivo = "$nombre.$ext";
        // Se mueve el archivo a la carpeta 'archivos'
        $resultado = move_uploaded_file($fichero['tmp_name'], './archivos/' . $nombreArchivo);
        return $resultado;
    }
    // Función que procesa múltiples archivos (no funcional)
    function procesarArchivos($archivos){
        foreach ($archivos['name'] as $indice => $archivo){
            if (str_starts_with($archivos['name'][$indice], 'cv') || str_starts_with($archivos['name'][$indice], 'img')) {
                return guardarArchivo($archivos['name'][$indice], $archivos['name'][$indice]);
            }
        }
    }
    // Función que limpia las entradas de datos
    function sanearDatos($datos){
        $resultado = htmlspecialchars($datos);
        $resultado = trim($resultado);
        $resultado = stripslashes($resultado);
        return $resultado;
    }
?>