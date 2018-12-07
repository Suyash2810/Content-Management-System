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

        $query_list = "SELECT * ";
        $query_list .= "FROM pages ";
        $query_list .= "WHERE visible = 1 ";
        $query_list .= "AND subject_id = {$page_id} ";
        $query_list .= "ORDER BY position ASC";
        $result_list = mysqli_query($connection,$query_list);

        return $result_list;
    }

    function get_oneSubject_by_id($subject_id_clicked){
        global $connection;

        $safe_subject_clicked_id = mysqli_real_escape_string($connection,$subject_id_clicked);
        $query = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE id = {$safe_subject_clicked_id} ";
        $query .= "LIMIT 1";
        //Querying the database
        $result = mysqli_query($connection,$query);
        $result_subject = mysqli_fetch_assoc($result);
        if($result_subject){
        return $result_subject;
        }else
        {return null;}
    }
?>