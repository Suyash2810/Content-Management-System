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
            $password = password_encrypt($_POST["password"]);
            
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
                redirection("new_admin.php");
            }
            
            $username = mysql_secure($username);

            $query = "INSERT INTO admins (username, hashed_password) ";
            $query .= "VALUES ( '{$username}', '{$password}' ) ";
            
            $result = mysqli_query($connection,$query);

            if(!$result){
                $_SESSION["message"] = "There has been an error! Admin was not added.";
                redirection("manage_admins.php");
            }
            else{
                $_SESSION["message"] = "Admin was added.";
                redirection("manage_admins.php");
            }
        }
        else
        {
            redirection("new_admin.php");
        }
    ?>
<?php mysqli_close($connection);?>