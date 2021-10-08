<?php 
require "header.php"; 
require "function.php";
if(isset($_GET['type']) && $_GET['type']!="")
{
    $id=$id=chechvalues($con,$_GET['id']);
    $sql2="DELETE FROM `post` WHERE `post_id`='$id'";
    if(mysqli_query($con,$sql2))
    {
       header('location:post.php');
    }
    else
    {
       echo "<script>alert('not delete')</script>";
   }
}
$limit='3';
$page="";
$role="";
$athor=$_SESSION['usrname'];
$sql="SELECT * FROM `user` where `username`='$athor'";
$res=mysqli_query($con,$sql);
$check=mysqli_num_rows($res);
if($check>0)
  {
    $row=mysqli_fetch_assoc($res);
    $role=$row['role'];
  }
 if($role=='1')
 {
 	if(isset($_GET['id']))
 	{
      $pages=$_GET['id'];
 	}
 	else
 	{
     $pages='1';
 	}
 	$offset=($pages-1)*$limit;
   $sql1="SELECT `post`.*,`category`.`category_id`,`user`.`username` FROM `post`,`category`,`user` where `post`.`category`=`category`.`category_id` and `post`.`author`=`user`.`username` LIMIT $offset,$limit";
     $res1=mysqli_query($con,$sql1);
 }
 else
 {
 	if(isset($_GET['id']))
 	{
      $pages=$_GET['id'];
 	}
 	else
 	{
     $pages='1';
 	}
 	$offset=($pages-1)*$limit;
    $sql1="SELECT `post`.*,`category`.`category_id` FROM `post`,`category` where `post`.`category`=`category`.`category_id` and`author`='$athor' LIMIT $offset,$limit";
    $res1=mysqli_query($con,$sql1);
 }
 
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Author Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                         while($row=mysqli_fetch_assoc($res1))
                        {
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['post_id'] ?></td>
                              <td><?php echo $row['title'] ?></td>
                              <td>
                                <?php
                                 $cat=$row['category']; 
                                 $sql2="SELECT * FROM `category` where `category_id`='$cat'";
                                 $res2=mysqli_query($con,$sql2);
                                 $check2=mysqli_num_rows($res2);
                                 if($check2>0)
                                   {
                                     $row2=mysqli_fetch_assoc($res2);
                                     $catnam=$row2['category_name'];
                                     echo $catnam;
                                    }
                              ?></td>
                              <td><?php echo $row['description'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php echo $row['author'] ?></td>
                             <?php 
                              echo "<td class='edit'><a href='update-post.php?type=update&id=".$row['post_id']."'><i class='fa fa-edit'></i></a></td>";
                              echo "<td class='delete'><a href='?type=delete&id=".$row['post_id']."'><i class='fa fa-trash-o'></i></a></td>";
                              ?>
                          </tr>
                         <?php } ?> 
                      </tbody>
                  </table>
        <?php 
            if($role=='1')
            { 
             $sql4="SELECT `post`.*,`category`.`category_id`,`user`.`username` FROM `post`,`category`,`user` where `post`.`category`=`category`.`category_id` and `post`.`author`=`user`.`username`";
             $res4=mysqli_query($con,$sql4);
             if(mysqli_num_rows($res4)>0)
            {
               $records=mysqli_num_rows($res4);
               $page=ceil($records/$limit);
              }
            }
             else
            {
             $sql4="SELECT `post`.*,`category`.`category_id` FROM `post`,`category` where `post`.`category`=`category`.`category_id` and`author`='$athor'";
             $res4=mysqli_query($con,$sql4);
             if(mysqli_num_rows($res4)>0)
               {
                $records=mysqli_num_rows($res4);
                $page=ceil($records/$limit);
                }   
            }
            echo "<ul class='pagination admin-pagination'>";
            for ($i=1; $i <=$page ; $i++)
                {
                 if(isset($_GET['id']) && $_GET['id']==$i)
                 {
                    $active="active";
                 }
                 else
                 {
                     $active="";
                 }
                echo "<li class=".$active."><a href='post.php?id=$i'>".$i."</a></li>";
                }
        ?>
               </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
