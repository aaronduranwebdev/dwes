<?php

$temperaturas = array();
for ($i = 0; $i < 30; $i++)
{
    $temperaturas[$i] = rand(17, 29);
}
foreach ($temperaturas as $diario)
{
    echo $diario . '&deg<br>';
}
$media = array_sum($temperaturas) / count($temperaturas);
echo 'La media de temperaturas es: ' . round($media, 2) . '&deg<br>';
echo 'Las cinco temperaturas más altas son:<br>';
arsort($temperaturas);
foreach (array_slice($temperaturas, 0, 5) as $temperatura)
{
    echo $temperatura . '&deg<br>';
}
sort($temperaturas);
echo 'Las cinco temperaturas más bajas son:<br>';
foreach (array_slice($temperaturas, 0, 5) as $temperatura)
{
    echo $temperatura . '&deg<br>';
}
?>