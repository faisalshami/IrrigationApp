<?php 
require "header.php"; 
require "function.php";
$incr='0';
$find="";
$found="";
if(isset($_GET['search']) && $_GET['search']!="")
{
    $id=chechvalues($con,$_GET['search']);
    $sql3="SELECT * FROM `post` where `title` LIKE '%$id%'";
    $res1=mysqli_query($con,$sql3);
    $chack=mysqli_num_rows($res1);
    if($chack>0)
    {
        $found='0';
    }
    else
    {
        $find="Not found any content";
        $found='1';
    }
} 
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  
                  <?php 
                if($found=='1')
                {
                    echo "<h3>".$find."</h3>";
                }
                else
                {
                    ?>
                    <h2 class="page-heading">Related to your search</h2>
                <?php    
                }
        while($row=mysqli_fetch_assoc($res1))
            {
                $pi=$row['post_img'];
            ?>
            <?php 
             if($incr<='4')
             {
            ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href='single.php?id=<?php echo $row['post_id']?>'><img src="<?php echo 'pic/'.$pi?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $row['post_id']?>'><?php echo $row['title']?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                           <?php echo $row['post_date']?>
                                           <?php $incr++; ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                       <?php echo substr($row['description'],0,205)."..."; ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
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
