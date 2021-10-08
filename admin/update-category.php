<?php
require "header.php"; 
require "function.php";
$cat="";
if(isset($_GET['type']) && $_GET['type']!="")
{
  $id=$id=chechvalues($con,$_GET['id']);
  $sql="SELECT * FROM `category` where `category_id`='$id'";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0)
  {
    $row=mysqli_fetch_assoc($res);
      $cat=$row['category_name'];
  }
  else
  {
    echo "<script>alert('not record found')</script>";
  }
}
if (isset($_POST['update_cat']))
{
    $cat_name=chechvalues($con,$_POST['cat_name']);
    if(isset($_GET['id']) && $_GET['id']!="")
  {  
    $id=chechvalues($con,$_GET['id']);
    $sql2="UPDATE `category` SET `category_name`='$cat_name' WHERE `category_id`='$id'";
       if (mysqli_query($con,$sql2))
        {
         header('location:category.php');
        } 
        else 
        {
           echo "<script>alert('record not update')</script>";
        }
  } 
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="1" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $cat?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="update_cat" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>


          
<?php include "footer.php"; ?>
