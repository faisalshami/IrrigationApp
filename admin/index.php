<?php
session_start();
require "function.php";
$con=mysqli_connect("localhost","root","","news");
if (isset($_POST['login']))
 {
    $username=chechvalues($con,$_POST['username']);
    $password=chechvalues($con,$_POST['password']);
    $query="SELECT * FROM `user` WHERE `username`='$username' and `password`='$password'";
    $res=mysqli_query($con,$query);
    $check=mysqli_num_rows($res);
    if ($check>0) {
    	$_SESSION['name']='login';
    	$_SESSION['usrname']=$username;
    	header('location:post.php');
    }
     else {
    echo "<script>alert('entered incorrect data')</script>";	
    }
    
}
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                        <h4>Not registered? <a href="add-user.php"> Create a account</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
