<?php 
    session_start();

    function message_subject(){

        if($_SESSION["message"]){
        
        $output = "<div class = \"text-center text-capitalize text-bold\" id = \"message_text\">";
        $output .= $_SESSION["message"];
        $output .= "</div>";
        }

        return $output;
    }
?>