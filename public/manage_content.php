<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php include('../Includes/templates/header.php'); ?>

<?php 
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    //Querying the database
    $result = mysqli_query($connection,$query);

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
                                                <?php 
                                                    echo $key["menu_name"] . "  (" . $key["id"] . ")" ;
                                                ?>
                                                <?php 
                                                    $query_list = "SELECT menu_name ";
                                                    $query_list .= "FROM pages ";
                                                    $query_list .= "WHERE visible = 1 ";
                                                    $query_list .= "AND subject_id = {$key["id"]} ";
                                                    $query_list .= "ORDER BY position ASC";
                                                    $result_list = mysqli_query($connection,$query_list);

                                                    check_queryStatus($result_list);
                                                ?>
                                                <ul id="inner_list">
                                                    <li>
                                                        <?php 
                                                             while($list_item = mysqli_fetch_assoc($result_list)){
                                                                 echo $list_item['menu_name'] . "<br>" ;
                                                             }
                                                        ?>
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
