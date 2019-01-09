<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/functions.php'); ?>

<?php 
    $_SESSION["admin_id"] = null;
    $_SESSION["username"] = null;

    redirection("login_admin.php");
?>