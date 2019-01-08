<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php $context_layout = "Tech Corp Admin";?>
<?php include('../Includes/templates/header.php'); ?>
<?php require_once('../Includes/widget_corp/validations.php'); ?>

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
                                <h2>Admin Login</h2>
                                <h6 style="margin-top:5%;">Welcome to the Admin Login Page.</h6>
                                <div id="list" style="margin-top:15%;">
                                    <div class="row">                                         
                                        <div class="col-md-12">
                                            <div class="well" style="background-color:transparent;">
                                                <form action="login_admin_check.php" method="post">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-4 col-sm-4">
                                                                <label for="username" style="font-size:20px;">Username:</label>
                                                            </div>
                                                            <div class="col-md-8 col-xs-8 col-sm-8" style="color:white;">
                                                                <input class="form-control" type="text" name="username" style="background-color:transparent;color:white;" placeholder="Admin Name." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-4 col-sm-4">
                                                                <label for="username" style="font-size:20px;">Password:</label>
                                                            </div>
                                                            <div class="col-md-8 col-xs-8 col-sm-8" style="color:white;">
                                                                <input class="form-control" type="password" name="password" style="background-color:transparent;color:white;" placeholder="*******" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-4 col-sm-4">
                                                                <label for="username" style="font-size:20px;">Login:</label>
                                                            </div>
                                                            <div class="col-md-4 col-md-offset-2 col-xs-4 col-xs-offset-2 col-sm-4 col-sm-offset-2" style="color:white;">
                                                                <input class="form-control" type="submit" name="submit" style="background-color:transparent;color:white;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>

                                                <div class="row">
                                                <div class="col-md-12">
                                                    <!-- PHP code to print errors by using session. -->
                                                    <?php $errors_list = errors();
                                                                    echo print_errors($errors_list);
                                                            ?>
                                                    <br>

                                                    <?php 
                                                        if(isset($_SESSION["message"])){
                                                    ?>
                                                    <p class="text-center"><?php echo htmlspecialchars($_SESSION["message"]);?></p>
                                                    
                                            <?php   $_SESSION["message"] = null; }
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