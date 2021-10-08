<?php 
require "header.php"; 
require "function.php";
   $id=chechvalues($con,$_GET['id']);
    $sql2="SELECT * from `post` WHERE `post_id`='$id'";
    $res1=mysqli_query($con,$sql2);

?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <?php 
                     while($row=mysqli_fetch_assoc($res1))
                        {
                          $pi=$row['post_img'];
                        ?>
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo 'pic/'.$pi?>">
                            <p class="description">
                               <?php echo $row['description']?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
            <?php } ?>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
