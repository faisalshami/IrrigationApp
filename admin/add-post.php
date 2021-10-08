<?php 
require "header.php"; 
require "function.php";
if(isset($_POST['addpost']))
{
  date_default_timezone_set("Asia/Karachi");
  $dat=date("Y-m-d h:i:s");
  $post_title=chechvalues($con,$_POST['post_title']); 
  $postdesc=chechvalues($con,$_POST['postdesc']);
  $categorys=chechvalues($con,$_POST['categorys']);
  $author=$_SESSION['usrname'];
  $fileToUpload=$_FILES['fileToUpload']['name'];
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'../pic/'.$fileToUpload);
  $sql="INSERT INTO `post`(`post_id`,`title`, `description`, `category`, `post_date`,`post_img`,`author`) VALUES (null,'$post_title','$postdesc','$categorys','$dat','$fileToUpload','$author')";
  if(mysqli_query($con,$sql))
   {
    header('location:post.php');
   }
   else
   {
    echo "<script>alert('post not add')<script>";
   }
}


?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="categorys" class="form-control">
                              <option value="" selected> Select Category</option>
                             <?php
                              $raw=mysqli_query($con,"SELECT category_id,`category_name` from `category` order by `category_name`");
                               while($ress=mysqli_fetch_assoc($raw))
                                {
                                    echo "<option value=".$ress['category_id'].">".$ress['category_name']."<option>";
                                }
                               ?>   
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload">
                      </div>
                      <input type="submit" name="addpost" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
