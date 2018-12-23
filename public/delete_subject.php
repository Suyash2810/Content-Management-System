<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>
<?php get_selected_subject_page();?>

<?php 
    $current_sub  = get_oneSubject_by_id($_GET["subject"]);

    if(!$current_sub)
    {      
        /* For being able to edit the subject in the database we need the subject id and in case
        if it is not present then we redirect the page.*/
        redirection("manage_content.php");
    }


    /* When there is no error encountered regarding the existance of a particular subject.
      Then we will perform the query to delete that same subject from the database.*/

      $id = $current_sub["id"];

      $query = "DELETE FROM subjects ";
      $query .= "WHERE id={$id} ";
      $query .= "LIMIT 1";

      $result = mysqli_query($connection,$query);

      if($result && mysqli_affected_rows($connection)==1)
      {
          $message = "Deletion of subject was successful.";
          $_SESSION["message"] = $message;
          redirection("manage_content.php");
      }
      else{
        $message = "Deletion of subject was not successful.";
        $_SESSION["message"] = $message;
        redirection("manage_content.php?subject={$id}");
      }
?>
<?php mysqli_close($connection);?>