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
            $page_id = $_GET["page"];
            $content = $_POST["content"];
            
            //Checking for Validations.
            if($menu_name === '')
            {
                $errors["Menu Name"] = "Menu Name cannot be empty.";
            }

            if($position === '' || !isset($position))
            {
                $errors["Position"] = "Position cannot be empty.";
            }

            if($visible === '' || !isset($visible))
            {
                $errors["Visible"] = "Visible cannot be empty.";
            }

            if($content === '')
            {
                $errors["Content"] = "Content cannot be empty.";
            }

            $max_length_array = array("menu_name" => 20);
            validate_maximum_length($max_length_array);

            if(empty($errors))
            {   
                $menu_name = mysql_secure($menu_name);

                $query = "UPDATE pages ";
                $query .= "SET subject_id = {$id}, ";
                $query .= "menu_name = '{$menu_name}', ";
                $query .= "position = {$position}, ";
                $query .= "visible = {$visible}, ";
                $query .= "content = '{$content}' ";
                $query .= "WHERE id = {$page_id} ";
                $query .= "LIMIT 1";
                
                $result = mysqli_query($connection,$query);

                if(!$result){
                    $message = "There has been an error! Page was not updated.";
                }
                else{
                    if(mysqli_affected_rows($connection) >= 0)
                    {
                        $_SESSION["message"] = "Page was updated.";
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
                                            >
                                            <?php echo $key["menu_name"] ;?></a>

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
                                                    id="inner_links">
                                                    <?php  echo $list_item['menu_name'] ;?></a>
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
                            <h4 style="margin-top:5%;">Edit a page of : <?php $sub = get_oneSubject_by_id($clicked_subject_id);
                                echo htmlspecialchars($sub["menu_name"]);
                            ?> :- &nbsp; <?php $pg = get_onePgae_by_id($_GET["page"]); echo htmlspecialchars($pg["menu_name"]);?> </h4>
                            <br>
                            <div id="list">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-12" id="form_data">
                                            <form action="./edit_page.php?subject=<?php echo urlencode($_GET["subject"]);?>&page=<?php 
                                            echo urlencode($_GET["page"]);?>" method="post">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1">
                                                            <label for="name">Name </label>
                                                        </div>
                                                        <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                                                            <input type="text" class="form-control" placeholder="Menu Name"
                                                                name="menu_name" style="background-color:transparent;color:black;">
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
                                                                                $subject_assoc_array = get_pages($_GET["subject"]);
                                                                                $subject_counter = mysqli_num_rows($subject_assoc_array);
                                                                                for($i = 1; $i<= $subject_counter+1; $i++)
                                                                                {
                                                                                    echo "<option value=\"{$i}\" style = \"background-color:transparent;\">{$i}</option>";
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
                                                                        <div class="col-md-6 col-sm-6 col-xs-6">Yes
                                                                        </div>
                                                                        <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                            <input type="radio" name="radio_button"
                                                                                value="1"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-xs-6">No
                                                                        </div>
                                                                        <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                            <input type="radio" name="radio_button"
                                                                                value="0"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
                                                                        <div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">
                                                                                     <label for="name">Content</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-10 col-md-offset-1 col-xs-8 col-xs-offset-2">
                                                                        <textarea name="content" id="content_area" cols="40" rows="1" style="background-color:transparent;border:1px solid whitesmoke;"></textarea>
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
                                                                <label for="create">Create </label>
                                                            </div>
                                                            <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                <input type="submit" class="form-control" name="submit"
                                                                    style="background-color:transparent;color:white;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                <label for="create">Cancel </label>
                                                            </div>
                                                            <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                <a href="./manage_content.php" class="btn btn-block btn-default"
                                                                    style="background-color:transparent;color:white;">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                                                    <label for="Edit">Delete </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4">
                                                                        <a href="./delete_page.php?page=<?php echo $_GET["page"];?>" class="btn btn-block btn-default" style="background-color:transparent;color:white;" onclick="return confirm('Are you sure?');">Delete</a>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    
                                            </form>
                                            <!-- Printing the errors encountered in the input. -->
                                                
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- PHP code to print errors by using session. -->
                                                    <?php $errors_list = errors();
                                                                    echo print_errors($errors_list);
                                                                    echo $message;
                                                            ?>
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