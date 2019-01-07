<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php $context_layout = "Tech Corp Admin";?>
<?php include('../Includes/templates/header.php'); ?>

<?php get_selected_subject_page();?>

<?php 
    $result = get_subjects();
    check_queryStatus($result);
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
                            <!-- Has to remain blank for this page. -->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="well" id="inner2" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="200">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Manage Admins</h2>
                                <h6 style="margin-top:5%;">Welcome to the admins management area.</h6>
                                <div id="list" style="margin-top:15%;">
                                    <div class="row" >
                                        <?php $names_admin = get_admins();?>
                                        
                                        <div class="col-md-12">
                                            <div class="panel-group" style="background-color:transparent;">
                                                <?php 
                                                    while($name = mysqli_fetch_assoc($names_admin))
                                                    { ?>
                                                        
                                                        <div class="panel panel-default" style="background-color:transparent;">
                                                            <div class="panel-body" style="background-color:transparent;">
                                                                <h4 class="pull-left"><?php echo htmlspecialchars($name["username"]);?></h4>
                                                                <h4 class="pull-right" style="margin:1%;"><a href="delete_admin.php?id=<?php echo urlencode($name["id"]);?>" style="color:white;">Delete</a></h4>
                                                                <h4 class="pull-right" style="margin:1%;"><a href="edit_admin.php?id=<?php echo urlencode($name["id"]);?>" style="color:white;">Edit</a></h4>                                                               
                                                            </div>                                                           
                                                        </div>
                                                   <?php } ?>
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