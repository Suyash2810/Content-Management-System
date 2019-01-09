<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php confirm_admin_logged_in();?>
<?php $context_layout = "Tech Corp Admin";?>
<?php include('../Includes/templates/header.php'); ?>
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
                                <div>
                                    Info
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="well" id="inner2" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="200">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>Admin Menu</h2>
                                <h6 style="margin-top:5%;">Welcome to the admin area.</h6>
                                <h6><?php 
                                    if(isset($_SESSION["username"]))
                                    {
                                        echo htmlspecialchars($_SESSION["username"]);
                                    }
                                ?></h6>
                                <div id="list">
                                    <ul>
                                        <li><a href="./manage_content.php">Manage Website Content</a></li>
                                        <li><a href="./manage_admins.php">Manage Admin Users</a></li>
                                        <li><a href="./logout_admin.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../Includes/templates/footer.php') ?>