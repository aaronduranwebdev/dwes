<?php

    enum ParserError: string {
        case EmptyField = "Required fields not submitted";
        case InvalidDate = "Date is incorrect";
    }

    class Parser {

        // Sanitize input and check if any required field is omitted or not
        static public function check_fields(&...$required_fields){
            foreach($required_fields as &$element){
                $element = trim($element);
                $element = htmlspecialchars($element);

                if(empty($element)){
                    return ParserError::EmptyField;
                }
            }

            return Parser::parse_date() ? true : ParserError::InvalidDate;
        }

        /*
            Check if name and extension are in a valid format

            A file is considered to have valid format if its name starts
            with 'cv' and is a pdf or its name starts with 'img' and is an image 

        */
        static public function check_format($name, $extension){
            return ((str_starts_with($name, "cv") && in_array($extension, array("pdf"))) || (str_starts_with($name, "img") && in_array($extension, array("jpg", "jpeg", "png"))));
        }

        /* Parses the date defined in the POST data and checks if it's a valid date */
        static public function parse_date(){
            $day = intval($_POST["day"]);
            $month = intval($_POST["month"]);
            $year = intval($_POST["year"]);

            return checkdate($month, $day, $year);
        }
    }