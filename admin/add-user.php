<?php 
require "function.php";
$con=mysqli_connect("localhost","root","","news");
if (isset($_POST['submit']))
{
    $fname=chechvalues($con,$_POST['fname']);
    $lname=chechvalues($con,$_POST['lname']);
    $user=chechvalues($con,$_POST['user']);
    $password=chechvalues($con,$_POST['password']);
    $role=chechvalues($con,$_POST['role']);
   // $sql1="SELECT * FROM `user` WHERE username='$user'";
   // 
    $check1=0;
    //if(mysqli_num_rows($check1)> 0)
    //{
    //   echo "<script>alert('This user already exist')</script>";
    //}
    //else
    //{
       $sql2="INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fname','$lname','$user','$password','$role')";
       //echo "INSERT INTO `user`(id,`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fname','$lname','$user','$password','$role')";
       //echo $sql2;
       if (mysqli_query($con,$sql2))
        {
         header('location:index.php');
        } 
        else 
        {
           echo "<script>alert('Not create account')</script>";
        }
       
   // }
} 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Create account</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        <a href="index.php" class="admin-logout" >login</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Create User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                          </select>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
