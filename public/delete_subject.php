<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>
<?php get_selected_subject_page();?>

<?php 
    $current_sub  = get_oneSubject_by_id($clicked_subject_id);

    if(!$current_sub)
    {      
        /* For being able to edit the subject in the database we need the subject id and in case
        if it is not present then we redirect the page.*/
        redirection("manage_content.php");
    }
?>