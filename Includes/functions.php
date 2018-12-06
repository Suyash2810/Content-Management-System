<?php 
    function check_queryStatus($query_result)
    {
        if(!$query_result)
        {
            die("Querying the database failed.");
        }
    }
?>