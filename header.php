<?php
$con=mysqli_connect("localhost","root","","news");
$page=basename($_SERVER['PHP_SELF']);
$title="";
switch ($page)
{
  case "single.php":
       if(isset($_GET['id']) && $_GET['id']!="")
       {
        $id=$_GET['id'];
         $sql4="SELECT * from `post` WHERE `post_id`='$id'";
        $res4=mysqli_query($con,$sql4);
        $title_row=mysqli_fetch_assoc($res4);
        $title=$title_row['title'];
       }
       else
       {
        $title="no post found";
       }
    break;
    case "category.php":
       if(isset($_GET['id']) && $_GET['id']!="")
       {
        $id=$_GET['id'];
         $sql4="SELECT * from `category` WHERE `category_id`='$id'";
        $res4=mysqli_query($con,$sql4);
        $title_row=mysqli_fetch_assoc($res4);
        $title=$title_row['category_name'];
       }
       else
       {
        $title="no post found";
       }
    break;
     case "search.php":
       if(isset($_GET['search']) && $_GET['search']!="")
       {
        $id=$_GET['search'];
        $title=$_GET['search'];
       }
       else
       {
        $title="no search found";
       }
    break;
  default:
      $title="Politics";
    break;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.png"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                   <?php
                     $active="";
                      if(isset($_GET['id']) && $_GET['id']!="")
                       {
                        $getid=$_GET['id'];
                       }
                       $sql2="SELECT * from `category` order by `category_id` desc";
                       $res1=mysqli_query($con,$sql2); 
                     while($row=mysqli_fetch_assoc($res1))
                    {
                        if(isset($_GET['id']) && $_GET['id']!="")
                       {
                        if($row['category_id']==$getid)
                        {
                           $active="active";
                        }
                        else
                        {
                          $active="";
                        }
                      } 
                      else if($row['category_id']=='38')
                      {
                         $active="active";
                      }
                      else
                      {
                        $active="";
                      }                   
                    echo "<li><a class='$active' href='category.php?id=".$row['category_id']."'>".$row['category_name']."</a></li>";
                 } ?>
                </ul> 
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
