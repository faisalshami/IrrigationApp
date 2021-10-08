<?php 
require "header.php"; 
require "function.php";
$title="";
$des="";
$cata="";
$pi="";
if(isset($_GET['type']) && $_GET['type']!="")
{
     $id=chechvalues($con,$_GET['id']);
     $sql3="SELECT * FROM `post` where `post_id`='$id'";
     $res1=mysqli_query($con,$sql3);
     $check=mysqli_num_rows($res1);
      if($check>0)
      {
        $row=mysqli_fetch_assoc($res1);
        $title=$row['title'];
        $des=$row['description'];
        $cata=$row['category'];
        $pi=$row['post_img'];
      }
      else
      {
        header('location:post.php');
      }
}
if(isset($_POST['updatepost']))
{
  date_default_timezone_set("Asia/Karachi");
  $dat=date("Y-m-d h:i:s");
  $post_title=chechvalues($con,$_POST['post_title']); 
  $postdesc=chechvalues($con,$_POST['postdesc']);
  $categorys=chechvalues($con,$_POST['categry']);
  $fileToUpload=$_FILES['new-image']['name'];
  move_uploaded_file($_FILES['new-image']['tmp_name'],'../pic/'.$fileToUpload);
  if(isset($_GET['id']) && $_GET['id']!="")
  {  
    $id=chechvalues($con,$_GET['id']);
    $sql="UPDATE `post` SET `title`='$post_title',`description`='$postdesc',`category`='$categorys',`post_date`='$dat',`post_img`='$fileToUpload' WHERE `post_id`='$id'";
  if(mysqli_query($con,$sql))
   {
    header('location:post.php');
   }
   else
   {
    echo "<script>alert('not update')<script>";
   }
  } 
}
 ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $title?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $des?>
                
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="categry" >

                    <option selected value="<?php echo $cata?>">
                        <?php
                        $catnam="";
                        $sql2="SELECT * FROM `category` where `category_id`='$cata'";
                                 $res2=mysqli_query($con,$sql2);
                                 $check2=mysqli_num_rows($res2);
                                 if($check2>0)
                                   {
                                     $row2=mysqli_fetch_assoc($res2);
                                     $catnam=$row2['category_name'];
                                     echo $catnam;
                                    }
                     ?></option>
                    <?php
                              $raw=mysqli_query($con,"SELECT category_id,`category_name` from `category` order by `category_name`");
                               while($ress=mysqli_fetch_assoc($raw))
                                {
                                    if($catnam==$ress['category_name'])
                                    {

                                    }
                                    else
                                    {
                                    echo "<option value=".$ress['category_id'].">".$ress['category_name']."<option>";
                                    }
                                }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="<?php echo '../pic/'.$pi?>" height="150px">
                <input type="hidden" name="old-image" >
            </div>
            <input type="submit" name="updatepost" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
