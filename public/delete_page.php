<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>
<?php get_selected_subject_page();?>

<?php 
    $current_pag  = get_onePgae_by_id($_GET["page"]);

    if(!$current_pag)
    {      
        /* For being able to delete the page in the database we need the page id and in case
        if it is not present then we redirect the page.*/
        redirection("manage_content.php");
    }

    /* When there is no error encountered regarding the existance of a particular subject.
      Then we will perform the query to delete that same subject from the database.*/

      $id = $current_pag["id"];

      $query = "DELETE FROM pages ";
      $query .= "WHERE id={$id} ";
      $query .= "LIMIT 1";

      $result = mysqli_query($connection,$query);

      if($result && mysqli_affected_rows($connection)==1)
      {
          $message = "Deletion of page was successful.";
          $_SESSION["message"] = $message;
          redirection("manage_content.php");
      }
      else{
        $message = "Deletion of page was not successful.";
        $_SESSION["message"] = $message;
        redirection("manage_content.php?subject={$id}");
      }
?>
<?php mysqli_close($connection);?>