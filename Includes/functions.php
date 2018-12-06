<?php 
    function check_queryStatus($query_result)
    {
        if(!$query_result)
        {
            die("Querying the database failed.");
        }
    }

    function get_subjects(){

        global $connection;

        $query = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE visible = 1 ";
        $query .= "ORDER BY position ASC";
        //Querying the database
        $result = mysqli_query($connection,$query);

        return $result;
    }

    function get_pages($page_id){
        global $connection;

        $query_list = "SELECT menu_name ";
        $query_list .= "FROM pages ";
        $query_list .= "WHERE visible = 1 ";
        $query_list .= "AND subject_id = {$page_id} ";
        $query_list .= "ORDER BY position ASC";
        $result_list = mysqli_query($connection,$query_list);

        return $result_list;
    }
?>