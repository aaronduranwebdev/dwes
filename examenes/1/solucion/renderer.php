<?php

    enum Site: string {
        case Index = "index.php";
        case Product = "product.php";
        case Service = "service.php";
    }

    enum RouteError: string {
        case NotFound = "404.php";
    }

    class HTMLRenderer {

        static private $TEMPLATES_DIR = "templates/";

        static public function form($site, $error_message = ""){
            include HTMLRenderer::$TEMPLATES_DIR . $site->value;
        }

        static public function report($site){
            $page = substr_replace($site->value, "_report", strpos($site->value, "."), 0);
            include HTMLRenderer::$TEMPLATES_DIR . $page;
        }

        static public function error(){
            include HTMLRenderer::$TEMPLATES_DIR . RouteError::NotFound->value;
        }
    }
 