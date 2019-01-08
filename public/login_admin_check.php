<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

<?php 
    $errors = [];

    if(isset($_POST["submit"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username === '' || !isset($username))
        {
            $errors["Username"] = "Username cannot be empty.";
        }

        if($password === '' || !isset($password))
        {
            $errors["Password"] = "Password cannot be empty.";
        }

        if(empty($errors))
        {
            $admin_found_match = check_for_admin($username, $password);

            if($admin_found_match)
            {
                $_SESSION["admin_id"] = $admin_found_match["id"];
                $_SESSION["username"] = $admin_found_match["username"];
                redirection("admin.php");
            }
            else
            {
                $message = "Username/Password was not found.";
                $_SESSION["message"] = $message;
                redirection("login_admin.php");
            }
        }

    }
    else{
        redirection("login_admin.php");
    }
?>