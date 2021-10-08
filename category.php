<?php 
require "header.php"; 
require "function.php";
$cata="";
$limit='3';
$page="";
if(isset($_GET['id']) && $_GET['id']!="")
{
 $id=chechvalues($con,$_GET['id']);
}
else
 {

  header('location:index.php');

 }
 if(isset($_GET['pge']))
    {
      $pages=$_GET['pge'];
    }
    else
    {
     $pages='1';
    }
    $offset=($pages-1)*$limit;
    $sql2="SELECT * from `post` WHERE `category`='$id' order by `post_id` desc LIMIT $offset,$limit";
    $res1=mysqli_query($con,$sql2);
    $sql3="SELECT * from `category` WHERE `category_id`='$id'";
    $res2=mysqli_query($con,$sql3);
    while($row2=mysqli_fetch_assoc($res2))
    {
        $cata=$row2['category_name'];
    }
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading"><?php echo $cata?></h2>
                    <div class="post-content">

                        <div class="row">
                             <?php 
                                     while($row=mysqli_fetch_assoc($res1))
                                      {
                                        $pi=$row['post_img'];
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
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
                                </div>
                                <hr>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php 
             $page="";
             $sql4="SELECT * from `post` WHERE `category`='$id'";
             $res4=mysqli_query($con,$sql4);
             if(mysqli_num_rows($res4)>0)
            {
               $records=mysqli_num_rows($res4);
               $page=ceil($records/$limit);
            }
            echo "<ul class='pagination admin-pagination'>";
            for ($i=1; $i <=$page ; $i++)
                {
                 if(isset($_GET['pge']) && $_GET['pge']==$i)
                 {
                    $active="active";
                 }
                 else
                 {
                     $active="";
                 }
                echo "<li class=".$active."><a href='category.php?id=$id&pge=$i'>".$i."</a></li>";
                }
        ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
