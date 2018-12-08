<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>

    <?php 
        $errors = [];
        if(isset($_POST['submit']))
        {
            //When the submit button is clicked

            $menu_name = $_POST["menu_name"];
            $position = (int)$_POST["position"];
            $visible = (int)$_POST["radio_button"];

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