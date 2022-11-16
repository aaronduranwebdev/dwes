<?php

session_start();
// En cada visita añadimos un valor al array "visitas"
$_SESSION['visitas'][] = date("d-m-Y H:i:s");
foreach ($_SESSION['visitas'] as $valor) {
    echo "Visita realizada el día $valor<br>";
}
?>
