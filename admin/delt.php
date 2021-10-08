<?php
$con=mysqli_connect("localhost","root","","news") or die("not connection");
$did=$_POST['eid'];
$sql="DELETE FROM `category` WHERE `category_id`='$did'";
if(mysqli_query($con,$sql))
{
echo 1;
}
else
{
  echo 0;
}

?>