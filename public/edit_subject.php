<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php include('../Includes/templates/header.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>
<?php get_selected_subject_page();?>

<?php 
    $result = get_subjects();
    check_queryStatus($result);
?>

<?php 
    if(!$clicked_subject_id)
    {
        /* For being able to edit the subject in the database we need the subject id and in case
        if it is not present then we redirect the page.*/
        redirection("manage_content.php");
    }
?>

    <?php 
        $errors = [];
        $message = "";
        if(isset($_POST['submit']))
        {
            //When the submit button is clicked

            $menu_name = $_POST["menu_name"];
            $position = (int)$_POST["position"];
            $visible = (int)$_POST["radio_button"];
            $id = $clicked_subject_id;
            //Checking for Validations.
            $required_fields = array("menu_name","position","radio_button");
            validate_has_presences($required_fields);

            $max_length_array = array("menu_name" => 20);
            validate_maximum_length($max_length_array);

            if(empty($errors))
            {   
                $menu_name = mysql_secure($menu_name);

                $query = "UPDATE subjects ";
                $query .= "SET menu_name = '{$menu_name}', ";
                $query .= "position = {$position}, ";
                $query .= "visible = {$visible} ";
                $query .= "WHERE id = {$id} ";
                $query .= "LIMIT 1";
                
                $result = mysqli_query($connection,$query);

                if(!$result){
                    $message = "There has been an error! Subject was not updated.";
                }
                else{
                    if(mysqli_affected_rows($connection) == 1)
                    {
                        $_SESSION["message"] = "Subject was updated.";
                        redirection("manage_content.php");
                    }
                }
            }
        }
        else
        {
            //Redirecting simply to the same page.
        }
    ?>

    <div class="container-fluid">
        <div class="well" id="main_well">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p class="up">
                        <h1 class="display1" id="tech_heading" data-aos="zoom-in-up" data-aos-duration="1000">Tech
                            Corporation</h1>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="well" id="inner" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="100">
                            <div class="col-md-12">
                                <div id="center_anim">
                                    <div id="cernter_anim_inner">Click Here.</div>
                                </div>
                            </div>
                            <div id="hidden_info">
                                <div class="text-left">
                                    <ul class="list-data">
                                        <?php 
                                            while($key = mysqli_fetch_assoc($result))
                                            {                 
                                        ?>   

                                        <li>
                                                <a href="manage_content.php?subject=<?php echo urlencode($key["id"]) ;?>" 
                                                style="color:white;text-decoration:none;"
                                                ><?php echo $key["menu_name"] ;?></a>        

                                                <?php 
                                                    $result_list = get_pages($key["id"]);

                                                    check_queryStatus($result_list);
                                                ?>
                                                <ul id="inner_list">
                                                    <li>
                                                        <?php 
                                                             while($list_item = mysqli_fetch_assoc($result_list)){
                                                             ?>
                                                              <a href="manage_content.php?page=<?php echo urlencode($list_item["id"]) ;?>" 
                                                              style="color:white;text-decoration:none;"
                                                              id="inner_links"><?php  echo $list_item['menu_name'] ;?></a>
                                                              <br>

                                                             <?php } ?>
                                                    </li>
                                                </ul>
                                                <?php mysqli_free_result($result_list);?>
                                        </li>     
                                            <?php } ?>              
                                    </ul>

                                    <?php mysqli_free_result($result);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="well" id="inner2" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="200">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Manage Content</h2>
                                <?php $subject_has_clicked = get_oneSubject_by_id($clicked_subject_id);?>
                                <h4 style="margin-top:5%;">Edit existing subject: <?php echo $subject_has_clicked["menu_name"];?></h4>
                                <br>
                                <div id="list">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-12" id="form_data">
                                                    <form action="./edit_subject.php?subject=<?php echo $subject_has_clicked["id"];?>" method="post">
                                                         <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1">
                                                                    <label for="name">Name </label>
                                                                    </div>
                                                                    <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                                                                        <input type="text" class="form-control" placeholder="<?php echo $subject_has_clicked["menu_name"];?>" name="menu_name"
                                                                         style="background-color:transparent;color:black;">
                                                                    </div>
                                                                </div>
                                                         </div>

                                                         <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                    <label for="name">Position </label>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4  col-xs-4">
                                                                        <select class="form-control" name="position" style="background-color:transparent;color:black;">
                                                                            <?php 
                                                                                $subject_assoc_array = get_subjects();
                                                                                $subject_counter = mysqli_num_rows($subject_assoc_array);
                                                                                for($i = 1; $i<= $subject_counter+1; $i++)
                                                                                {
                                                                                    echo "<option value=\"{$i}\" style = \"background-color:transparent;\" ";
                                                                                    if($subject_has_clicked["position"] == $i)
                                                                                    {
                                                                                        echo " selected";
                                                                                    }
                                                                                    echo ">{$i}</option>";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                         </div> 

                                                         <div class="row">
                                                             <?php echo message_subject(); ?>
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1">
                                                                    <label for="name">Visible </label>
                                                                    </div>
                                                                    <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-6">Yes </div>
                                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                                    <input type="radio" name="radio_button" value="1" <?php if($subject_has_clicked["visible"] == 
                                                                                    1){echo "checked";}?>></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-6">No </div>
                                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                                    <input type="radio" name="radio_button" value="0" <?php if($subject_has_clicked["visible"] == 
                                                                                    0){echo "checked";}?>></div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                         </div>  
                                                            <br>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                    <label for="Edit">Edit </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                        <input type="submit" class="form-control" name="submit" style="background-color:transparent;color:white;">
                                                                    </div>
                                                                </div>
                                                         </div> 

                                                         <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                    <label for="Edit">Cancel </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                        <a href="./manage_content.php" class="btn btn-block btn-default" style="background-color:transparent;color:white;">Cancel</a>
                                                                    </div>
                                                                </div>
                                                         </div> 

                                                         <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                    <label for="Edit">Delete </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                        <a href="./delete_subject.php?subject=<?php echo $clicked_subject_id?>" class="btn btn-block btn-default" style="background-color:transparent;color:white;">Delete</a>
                                                                    </div>
                                                                </div>
                                                         </div> 
                                                    </form>
                                                    <!-- Printing the errors encountered in the input. -->

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php echo $message;?>
                                                            <!-- PHP code to print errors by using session. -->
                                                            <?php echo print_errors($errors);?>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../Includes/templates/footer.php') ?>
<?php mysqli_close($connection);?>