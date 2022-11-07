<?php
$ciudadPais = [
    'Tokio' => 'Japón',
    'Ciudad de México' => 'México',
    'Nueva York' => 'Estados Unidos',
    'Bombay' => 'India',
    'Seúl' => 'Corea del Sur',
    'Shanghái' => 'China',
    'Lagos' => 'Nigeria',
    'Buenos Aires' => 'Argentina',
    'Cairo' => 'Egipto',
    'Londres' => 'Reino Unido'
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ciudad = $_POST['ciudad'];
    $pais = $ciudadPais[$ciudad];
    echo "La ciudad de $ciudad está en $pais";
} else {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 8</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <select name="ciudad" id="ciudad">
            <?php
    foreach ($ciudadPais as $ciudad => $pais) {
        echo "<option value='$ciudad'>$ciudad</option>";
    }
            ?>
        </select>
        <input type="submit" value="Mostrar país">
    </form>
</body>

</html>
<?php
}
?>