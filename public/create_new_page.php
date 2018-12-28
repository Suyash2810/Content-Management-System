<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

    <?php 
        $errors = [];
        if(isset($_POST['submit']))
        {
            //When the submit button is clicked
            $subject_id = (int)$_GET["subject"];
            $menu_name = $_POST["menu_name"];
            $position = (int)$_POST["position"];
            $visible = (int)$_POST["radio_button"];
            $content = $_POST["content"];
            $content = mysql_secure($content);
            
            if($menu_name === '')
            {
                $errors["Menu Name"] = "Menu Name cannot be empty.";
            }

            if($position === '')
            {
                $errors["Position"] = "Position cannot be empty.";
            }

            if($visible === '')
            {
                $errors["Visible"] = "Visible cannot be empty.";
            }

            if($content === '')
            {
                $errors["Content"] = "Content cannot be empty.";
            }

            $max_length_array = array("menu_name" => 20);
            validate_maximum_length($max_length_array);

            if(!empty($errors))
            {   $_SESSION["errors"] = $errors;
                /*Session key will return an associative array of errors encountered which will be displayed
                on new_subject.php page after redirection.*/
                redirection("new_page.php?subject={$subject_id}");
            }
            
            $menu_name = mysql_secure($menu_name);

            $query = "INSERT INTO pages (subject_id, menu_name, position, visible, content) ";
            $query .= "VALUES ( $subject_id , '{$menu_name}', $position, $visible, '{$content}' ) ";
            
            $result = mysqli_query($connection,$query);

            if(!$result){
                $_SESSION["message"] = "There has been an error! Page was not created.";
                redirection("new_page.php?subject={$subject_id}");
            }
            else{
                $_SESSION["message"] = "Page was created.";
                redirection("manage_content.php");
            }
        }
        else
        {
            redirection("new_page.php");
        }
    ?>
<?php mysqli_close($connection);?>