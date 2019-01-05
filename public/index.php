<?php require_once('../Includes/widget_corp/session.php'); ?>
<?php require_once('../Includes/widget_corp/db_connect.php'); ?>
<?php require_once('../Includes/functions.php'); ?>
<?php $context_layout = "Tech Corp";?>
<?php include('../Includes/templates/header.php'); ?>

<?php get_selected_subject_page();?>

<?php 
    $result = get_subjects_public();
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
                                                <a href="index.php?subject=<?php echo urlencode($key["id"]) ;?>" 
                                                style="color:white;text-decoration:none;"
                                                ><?php echo $key["menu_name"] ;?></a>        

                                                <?php 
                                                    $result_list = get_pages_public($key["id"]);

                                                    check_queryStatus($result_list);
                                                ?>
                                                <ul id="inner_list">
                                                    <li>
                                                        <?php 
                                                             while($list_item = mysqli_fetch_assoc($result_list)){
                                                             ?>
                                                              <a href="index.php?page=<?php echo urlencode($list_item["id"]) ;?>" 
                                                              style="color:white;text-decoration:none;"
                                                              id="inner_links"><?php  echo $list_item['menu_name'] ;?></a>
                                                              <br>

                                                             <?php } ?>
                                                    </li>
                                                </ul>
                                                <?php mysqli_free_result($result_list);?>
                                        </li>     
                                            <?php } ?> 

                                            <br>
                                            <li><a href="admin.php" style="color:white;text-decoration:none;">&laquo; Main Menu</a></li>
                                                    
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
                                <h2>Public Access</h2>
                                <h6 style="margin-top:5%;">Welcome to the Public Area.</h6>
                                <div id="list">
                                    <?php 
                                        if(isset($clicked_subject_id)){
                                            $output_result = get_oneSubject_by_id($clicked_subject_id);
                                            ?>
                                            <p class="text-center">
                                               Menu Name : <?php echo htmlspecialchars($output_result["menu_name"]);?>
                                               <br>                                        
                                            </p>
                                        <?php
                                        } elseif(isset($clicked_page_id)){
                                           $output_result_page = get_onePgae_by_id($clicked_page_id);
                                           ?>
                                                <p class="text-center">
                                                    Page Name : <?php echo htmlspecialchars($output_result_page["menu_name"]);?>
                                                    <br><br>
                                                    &nbsp;
                                                    Content : <?php echo htmlspecialchars($output_result_page["content"]);?>
                                                </p>
                                        <?php
                                        }else{
                                          ?>
                                            <h4 class="display-4 text-center">
                                                <?php 
                                                    echo "Please select page from the panel.";
                                                ?>
                                            </h4>  
                                        <?php } ?>                                                                               
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