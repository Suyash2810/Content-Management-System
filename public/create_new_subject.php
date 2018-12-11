<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

    <?php 
        $errors = [];
        if(isset($_POST['submit']))
        {
            //When the submit button is clicked

            $menu_name = $_POST["menu_name"];
            $position = (int)$_POST["position"];
            $visible = (int)$_POST["radio_button"];

            //Checking for Validations.
            $required_fields = array("menu_name","position","radio_button");
            validate_has_presences($required_fields);

            $max_length_array = array("menu_name" => 20);
            validate_maximum_length($max_length_array);

            if(!empty($errors))
            {   $_SESSION["errors"] = $errors;
                /*Session key will return an associative array of errors encountered which will be displayed
                on new_subject.php page after redirection.*/
                redirection("new_subject.php");
            }

            $menu_name = mysql_secure($menu_name);

            $query = "INSERT INTO subjects (menu_name, position, visible) ";
            $query .= "VALUES ( '{$menu_name}', $position, $visible ) ";
            
            $result = mysqli_query($connection,$query);

            if(!$result){
                $_SESSION["message"] = "There has been an error! Subject was not created.";
                redirection("new_subject.php");
            }
            else{
                $_SESSION["message"] = "Subject was created.";
                redirection("manage_content.php");
            }
        }
        else
        {
            redirection("new_subject.php");
        }
    ?>
<?php mysqli_close($connection);?>