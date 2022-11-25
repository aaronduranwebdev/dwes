<?php

    include_once "renderer.php";
    include_once "fileprocessor.php";

    if(empty($_POST)){
        HTMLRenderer::form(Site::Service);
    }
    else {
        if(($res = Parser::check_fields($_POST["service_code"], $_POST["day"], $_POST["month"], $_POST["year"], $_FILES["image"]["tmp_name"])) !== true){
            HTMLRenderer::form(Site::Service, $res->value);
        }
        else if(($res = FileProcessor::save_files(PostFile::Required, $_POST["service_code"])) !== true){
            HTMLRenderer::form(Site::Service, $res->value);
        }
        else if(($res = FileProcessor::save_files(PostFile::Optional)) !== true){
            HTMLRenderer::form(Site::Service, $res->value);
        }
        else {
            HTMLRenderer::report(Site::Service);
        }
    }