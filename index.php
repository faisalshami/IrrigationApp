<?php 
require "header.php"; 
require "function.php";
$id='38';
$incr="0";
$sql="SELECT * FROM `post` where `category`='$id' order by `post_id` desc";
$res1=mysqli_query($con,$sql);
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content">
                            <div class="row">
                                <?php 
                                     while($row=mysqli_fetch_assoc($res1))
                                      {
                                        $pi=$row['post_img'];
                                      ?>
                                        <?php 
                                        if($incr<='4')
                                         {
                                         ?>
                                    
                                <div class="col-md-4">
                                    <a class="post-img" href='single.php?id=<?php echo $row['post_id']?>'><img src="<?php echo 'pic/'.$pi?>"></a>
                                </div>
                                <div class="col-md-8">
                                    
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']?>'><?php echo $row['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']?>
                                            </span>
                                        </div>
                                        <p class="description">
                                         <?php echo substr($row['description'],0,205)."..."; ?>   
                                         <?php $incr++; ?> 
                                        </p>
                                        <?php
                                        echo "<a class='read-more pull-right' href='single.php?id=".$row['post_id']."'>read more</a>";
                                       ?> 
                                    </div>
                                    <hr>
                                </div>
                                 <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
