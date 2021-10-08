<?php
$con=mysqli_connect("localhost","root","","news");
   $cata=$_POST['category'];
   $sql="INSERT INTO `category`(`category_name`) VALUES ('$cata')";
   if(mysqli_query($con,$sql))
   {
    echo 1;
   }
   else
   {
    echo 0;
   }
?>