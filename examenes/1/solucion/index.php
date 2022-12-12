<?php

    include_once "renderer.php";

    $config = parse_ini_file("index.config.ini", true);
    $allowed = $config["allowed_pages"];

    if(empty($_POST)){ HTMLRenderer::form(Site::Index); }
    else {
        $redirect = $_POST['site_choice'];
        if(in_array($redirect, array_keys($allowed))){
            $redirect = $allowed[$redirect];
            header("Location: $redirect");
        }
        else {
            HTMLRenderer::error();
        }
    }