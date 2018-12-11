<?php 
    session_start();

    function message_subject(){

        if($_SESSION["message"]){
        
        $output = "<div class = \"text-center text-capitalize text-bold\" id = \"message_text\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";
        }
        else{
            $output = null;
        }

        $_SESSION["message"] = null;
        return $output;
    }

    function errors()
    {
        if($_SESSION["errors"]){
        
            $errors = $_SESSION["errors"];

            $_SESSION["message"] = null;
            return $errors;
        }
    }
?>