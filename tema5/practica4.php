<?php
session_start();
$_SESSION['visitas'][] = date("d/m/y - H:i:s");
foreach ($_SESSION['visitas'] as $visita) {
    echo $visita . "<br>";
}
?>