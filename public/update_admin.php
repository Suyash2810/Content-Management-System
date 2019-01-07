<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

    <?php 
        $errors = [];
        if(isset($_POST['submit']))
        {
            //When the submit button is clicked
            $username = $_POST["username"];
            $password = $_POST["password"];
            $id = $_GET["id"];
            
            if($username === '')
            {
                $errors["Username"] = "Username cannot be empty.";
            }

            if($password === '' || !isset($password))
            {
                $errors["Password"] = "Password cannot be empty.";
            }

            if(!empty($errors))
            {   $_SESSION["errors"] = $errors;
                /*Session key will return an associative array of errors encountered which will be displayed
                on new_subject.php page after redirection.*/
                redirection("edit_admin.php");
            }
            
            $username = mysql_secure($username);

            $query = "UPDATE admins ";
            $query .= "SET username = '{$username}', ";
            $query .= "hashed_password = '{$password}' ";
            $query .= "WHERE id = {$id} ";
            
            $result = mysqli_query($connection,$query);

            if(!$result){
                $_SESSION["message"] = "There has been an error! Admin was not updated.";
                redirection("manage_admins.php");
            }
            else{
                $_SESSION["message"] = "Admin was updated.";
                redirection("manage_admins.php");
            }
        }
        else
        {
            redirection("edit_admin.php");
        }
    ?>
<?php mysqli_close($connection);?>