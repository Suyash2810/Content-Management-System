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
        // $query .= "WHERE visible = 1 ";
        $query .= "ORDER BY position ASC";
        //Querying the database
        $result = mysqli_query($connection,$query);

        return $result;
    }
    //Function for getting the pages for a particular subject.
    function get_pages($page_id){
        global $connection;

        $query_list = "SELECT * ";
        $query_list .= "FROM pages ";
        // $query_list .= "WHERE visible = 1 ";
        $query_list .= "WHERE subject_id = {$page_id} ";
        $query_list .= "ORDER BY position ASC";
        $result_list = mysqli_query($connection,$query_list);

        return $result_list;
    }

    function get_subjects_public(){

        global $connection;

        $query = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE visible = 1 ";
        $query .= "ORDER BY position ASC";
        //Querying the database
        $result = mysqli_query($connection,$query);

        return $result;
    }
    //Function for getting the pages for a particular subject.
    function get_pages_public($page_id){
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

    function get_default_page_for_subject_selected($subject){
        $pages_list = get_pages($subject);
        if($first_page = mysqli_fetch_assoc($pages_list))
        {
            return $first_page;
        }
        else
        return null;
    }

    function get_selected_subject_page(){
        global $clicked_subject_id;
        global $clicked_page_id;

        if(isset($_GET["subject"]))
        {
            $clicked_subject_id = $_GET["subject"];
            $clicked_page_id = get_default_page_for_subject_selected($clicked_subject_id);
            if($clicked_page_id["visible"] == 0)
            {
                $clicked_page_id = null;
            }
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

    function get_admins(){
       global $connection;

       $query = "SELECT * ";
       $query .= "FROM admins ";

       $names_result = mysqli_query($connection,$query);

       return $names_result;
    }

    function password_encrypt($pass){
        $hash_format = "$2y$10$";
        // Here blowfish algorithm is being used therefore the salt length should be 22 characters or more.
        $salt_length = 22;
        //Here we are generating a random salt using a function.
        $salt = generate_random_salt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($pass, $format_and_salt);
        return $hash;
    }

    function generate_random_salt($length){

        $unique_random_string = md5(uniqid(mt_rand(),true));
        $base64_string = base64_encode($unique_random_string);
        $modified_string = str_replace("+", ".", $base64_string);
        $salt = substr($modified_string, 0, $length);

        return $salt;
    }

    function check_password_equality($password, $existing_hash_password){
        $check = crypt($password,$existing_hash_password);
        if($check === $existing_hash_password)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function find_admin_by_username($username)
    {
        global $connection;
        $safe_username = mysqli_real_escape_string($connection, $username);
        $query = "SELECT * ";
        $query .= "FROM admins ";
        $query .= "WHERE username = '{$safe_username}' ";

        $names_result = mysqli_query($connection,$query);
        $result = mysqli_fetch_assoc($names_result);
        return $result;

    }

    function check_for_admin($username, $password){
        $admin = find_admin_by_username($username);

        if($admin)
        {
            // Now we will check for the password equality as username has been found.

            $check_pass = check_password_equality($password, $admin["hashed_password"]);

            if($check_pass)
            {
                return $admin;
            }
            else{
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function logged_in_user(){
        if(isset($_SESSION["admin_id"]))
        {return true;}
        else
        {return false;}
    }

    function confirm_admin_logged_in(){

        if(!logged_in_user()){
            redirection("login_admin.php");
        }
    }
?>