<?php
require "header.php"; 
require "function.php";
$firstname="";
$lastname="";
$u_password="";
$role="";

if(isset($_GET['type']) && $_GET['type']!="")
{
     $id=chechvalues($con,$_GET['id']);
     $sql3="SELECT * FROM `user` where `user_id`='$id'";
     $res1=mysqli_query($con,$sql3);
     $check=mysqli_num_rows($res1);
      if($check>0)
      {
        $row=mysqli_fetch_assoc($res1);
        $firstname=$row['first_name'];
        $lastname=$row['last_name'];
        $u_password=$row['password'];
        $role=$row['role'];
      }
      else
      {
        header('location:users.php');
      }
}
if (isset($_POST['update']))
{
    $fname=chechvalues($con,$_POST['f_name']);
    $lname=chechvalues($con,$_POST['l_name']);
    $pass=chechvalues($con,$_POST['u_password']);
    $role=chechvalues($con,$_POST['r_role']);
    if(isset($_GET['id']) && $_GET['id']!="")
  {  
    $id=$id=chechvalues($con,$_GET['id']);
    $sql2="UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`password`='$pass',`role`='$role' WHERE `user_id`='$id'";
       if (mysqli_query($con,$sql2))
        {
         header('location:users.php');
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
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="1" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $firstname?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $lastname?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>password</label>
                          <input type="password" name="u_password" class="form-control" value="<?php echo $u_password?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="r_role" value="<?php echo $role?>">
                              <option value="0">normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="update" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
