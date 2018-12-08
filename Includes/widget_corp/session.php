<?php 
    session_start();

    function message_subject(){

        if($_SESSION["message"]){
        
        $output = "<div class = \"text-center text-capitalize text-bold\" id = \"message_text\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";
        }

        $_SESSION["message"] = null;
        return $output;
    }
?>