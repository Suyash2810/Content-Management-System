<?php 
        //Creating a database connection
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'secret';
        $dbname = 'widget_corp';

        $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        //Checking whether the connection has been established successfully.

        if(mysqli_connect_errno())
         {
             die(
                 "Database Connection has failed: " .
                 mysqli_connect_error() . 
                "( " . mysqli_connect_errno() . " )"
             );
         }
?>
<?php require_once('../Includes/functions.php'); ?>
<?php include('../Includes/templates/header.php'); ?>

<?php 
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    //Querying the database
    $result = mysqli_query($connection,$query);

    if(!$result)
    {
        die("Querying the database failed.");
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
                                <h2>Manage Content</h2>
                                <h6 style="margin-top:5%;">Welcome to the content management area.</h6>
                                <div id="list">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../Includes/templates/footer.php') ?>