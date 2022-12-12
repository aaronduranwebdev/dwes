<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre'])) {
        setcookie('viajes[nombre]', $_POST['nombre'], time() + 3000);
    }
    if (isset($_POST['asiento'])) {
        setcookie('viajes[asiento]', $_POST['asiento'], time() + 3000);
    }
    if (isset($_POST['menu'])) {
        setcookie('viajes[menu]', $_POST['menu'], time() + 3000);
    }
    if (isset($_POST['aeropuertos'])) {
        setcookie('viajes[aeropuerto]', implode(',', $_POST['aeropuertos']), time() + 3000);
    }
}
$asientos = array(
    'Pasillo' => 'pasillo',
    'Ventana' => 'ventana',
    'Centro' => 'centro'
);
$menus = array(
    'Vegetariano' => 'vegetariano',
    'No vegetariano' => 'novegetariano',
    'Diabético' => 'diabetico',
    'Infantil' => 'infantil'
);
$aeropuertos = array(
    'Londres (LHR)' => 'lhr',
    'París (CDG)' => 'cdg',
    'Roma (CIA)' => 'cia',
    'Ibiza (IBZ)' => 'ibz',
    'Singapur (SIN)' => 'sin',
    'Hong Kong (HKG)' => 'hkg',
    'Malta (MLA)' => 'mla',
    'Bombay (BOM)' => 'bom'
);
function comprobarAsiento($asiento)
{
    if (isset($_COOKIE['viajes']['asiento']) && $_COOKIE['viajes']['asiento'] == $asiento) {
        return true;
    }
}
function comprobarMenu($menu)
{
    if (isset($_COOKIE['viajes']['menu']) && $_COOKIE['viajes']['menu'] == $menu) {
        return true;
    }
}
function comprobarAeropuerto($codigo)
{
    if (isset($_COOKIE['viajes']['aeropuerto'])) {
        $seleccionados = explode(',', $_COOKIE['viajes']['aeropuerto']);
        if (in_array($codigo, $seleccionados)) {
            return true;
        }
    }
}
function generarAsientos(array $asientos)
{
    foreach ($asientos as $nombre => $codigo) {

        echo "<option value='$codigo'";
        if (comprobarAsiento($codigo)) {
            echo " selected";
        }
        echo ">$nombre</option>";
    }
}
function generarMenus(array $menus)
{
    foreach ($menus as $nombre => $codigo) {

        echo "<option value='$codigo'";
        if (comprobarMenu($codigo)) {
            echo " selected";
        }
        echo ">$nombre</option>";
    }
}

function generarAeropuertos(array $aeropuertos)
{

    foreach ($aeropuertos as $nombre => $codigo) {
        echo "<div class='aeropuerto'>";
        echo "<input type='checkbox' name='aeropuertos[]' id='$codigo' value='$codigo'";
        if (comprobarAeropuerto($codigo)) {
            echo " checked";
        }
        echo "><label for='$codigo'>$nombre</label>";
        echo "</div>";
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 3</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 250px;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php if (isset($_COOKIE['viajes']['nombre'])) { echo $_COOKIE['viajes']['nombre'];} ?>">
        </div>
        <div>
            <label for="asiento">Asiento</label>
            <select name="asiento" id="asiento">
                <?php generarAsientos($asientos); ?>
            </select>
        </div>
        <div>
            <label for="menu">Menú</label>
            <select name="menu" id="menu">
                <?php generarMenus($menus); ?>
            </select>
        </div>
        <div>
            <p>Aeropuertos</p>
            <?php generarAeropuertos($aeropuertos); ?>

        </div>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>