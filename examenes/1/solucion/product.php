<?php

    include_once "renderer.php";
    include_once "parser.php";

    if(empty($_POST)) { HTMLRenderer::form(Site::Product); }
    else {
        if(($res = Parser::check_fields($_POST["product_name"], $_POST["day"], $_POST["month"], $_POST["year"])) !== true){
            HTMLRenderer::form(Site::Product, $res->value);
        }
        else {
            HTMLRenderer::report(Site::Product);
        }
    }