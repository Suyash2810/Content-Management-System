<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

<?php 
    $id = $_GET["id"];

    if(!$id)
    {      
        /* For being able to delete the admin in the database we need the id and in case
        if it is not present then we redirect the page.*/
        redirection("manage_admins.php");
    }

    /* When there is no error encountered regarding the existance of a particular admin.
      Then we will perform the query to delete that same admin from the database.*/

      $query = "DELETE FROM admins ";
      $query .= "WHERE id={$id} ";
      $query .= "LIMIT 1";

      $result = mysqli_query($connection,$query);

      if($result && mysqli_affected_rows($connection)==1)
      {
          $message = "Deletion of admin was successful.";
          $_SESSION["message"] = $message;
          redirection("manage_admins.php");
      }
      else{
        $message = "Deletion of admin was not successful.";
        $_SESSION["message"] = $message;
        redirection("manage_admins.php");
      }
?>
<?php mysqli_close($connection);?>