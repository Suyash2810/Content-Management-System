<?php function redirection($redirect_to)
    {header("Location: " . $redirect_to);
    exit;}

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

    function get_onePgae_by_id($page_id_clicked){
        global $connection;
        
        $safe_page_clicked_id = mysqli_real_escape_string($connection,$page_id_clicked);
        $query_list = "SELECT * ";
        $query_list .= "FROM pages ";
        $query_list .= "WHERE id = {$safe_page_clicked_id} ";
        $query_list .= "LIMIT 1";
        $result_list = mysqli_query($connection,$query_list);
        $result_list_output = mysqli_fetch_assoc($result_list);
        if($result_list_output){
            return $result_list_output;
        }else{
            return null;
        }
    }

    function get_selected_subject_page(){
        global $clicked_subject_id;
        global $clicked_page_id;

        if(isset($_GET["subject"]))
        {
            $clicked_subject_id = $_GET["subject"];
            $clicked_page_id = null;
        }
        elseif(isset($_GET["page"]))
        {
            $clicked_page_id = $_GET["page"];
            $clicked_subject_id = null;
        }
        else
        {
            $clicked_subject_id = null;
            $clicked_page_id = null;
        }
    }

    function menu_check($name){
        if(isset($name) && $name !== "")
        {
            return true;
        }
        else{
            return false;
        }
    }

    function mysql_secure($string){
        global $connection;

        $secured_string = mysqli_real_escape_string($connection,$string);
        return $secured_string;
    }
?>