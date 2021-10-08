<?php
$con=mysqli_connect("localhost","root","","news") or die("not connection");
$perpage=3;
$pag="";
if(isset($_POST['pages']))
{
$pag=$_POST['pages'];
}
else
{
 $pag=0; 
}
$sql1="SELECT * FROM `category` LIMIT {$pag},{$perpage}";
$res=mysqli_query($con,$sql1);
$output="";
if(mysqli_num_rows($res)>0)
{
   $output='<table class="content-table">
   <tbody>
   <tr>
     <th>S.No.</th>
    <th>Category Name</th>
    <th>No. of Posts</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>';
    $rows="";
    $cat_id="";
   while($row=mysqli_fetch_assoc($res))
   {
    $cat_id=$row['category_id'];

   	$output.="<tr><td class='id'>".$cat_id."</td>";
    $sql4="SELECT * FROM `post` where `category`='$cat_id'";
                            $res4=mysqli_query($con,$sql4);
                             $check=mysqli_num_rows($res4);
                            if($check>0)
                            {
                             $rows=mysqli_num_rows($res4);
                            }
      $output.="<td>".$row['category_name']."</td>";
      $output.="<td>".$rows."</td>";
      $output.="</td><td class='edit'><a href='update-category.php?type=update&id=".$row['category_id']."'><i class='fa fa-edit'></i></a></td><td><button class='del' data-id='{$row['category_id']}'>delete</button></td></tr>";
   }
  $output.="</table>"; 
  $output.='<div id="pagination">';
   $output.="<button id='more' data-id='{$cat_id}'>load more</button>"; 
    $output.='</div>';
  echo $output; 
}
else
{
  
}

?>