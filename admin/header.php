<?php 
session_start();
$con=mysqli_connect("localhost","root","","news");
if(!isset($_SESSION['name']))
{
    header('location:index.php');
}
$nam=$_SESSION['usrname'];
$sql3="SELECT * FROM `user` where `username`='$nam'";
     $res1=mysqli_query($con,$sql3);
     $check=mysqli_num_rows($res1);
      if($check>0)
      {
        $row=mysqli_fetch_assoc($res1);
        $role=$row['role'];
      }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">

<!-- JS, Popper.js, and jQuery -->
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
                    
                    <div class="col-md-offset-9  col-md-1">
                        <?php 
                      if(isset($_SESSION['name']))
                      {echo "<h2>".$_SESSION['usrname']."</h2>";
                      }
                    ?>
                        <a href="logout.php" class="admin-logout" >logout</a>
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
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php 
                            if($role=='1')
                             {
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
