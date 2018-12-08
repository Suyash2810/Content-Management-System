<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>

    <?php 
        $errors = [];
        if(isset($_POST['submit']))
        {
            redirection("manage_content.php");
        }
        else
        {
            redirection("new_subject.php");
        }
    ?>
<?php mysqli_close($connection);?>