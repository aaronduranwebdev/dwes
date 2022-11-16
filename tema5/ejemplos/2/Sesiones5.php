<?php

require_once('clases/Visita.php');
session_start();
// Creamos un nuevo objeto y lo guardamos en la sesión
$o = new Visita();
$o->setTiempo(date("d-m-Y H:i:s"));
$_SESSION['visita'] = $o;
?>

