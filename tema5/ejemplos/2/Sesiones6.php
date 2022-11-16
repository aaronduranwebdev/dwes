<?php

require_once('clases/Visita.php');
session_start();
// Recuperamos o obxecto da sesión
$o = $_SESSION['visita'];
echo "$o";
?>

