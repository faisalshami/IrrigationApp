<?php 
require "header.php"; 
require "function.php";
if (isset($_GET['type']) && $_GET['type']!='') 
{
  $type=chechvalues($con,$_GET['type']);
  if($type=='delete')
  {
    $id=chechvalues($con,$_GET['id']);
    $sql4="DELETE FROM `user` WHERE `user_id`='$id'";
    mysqli_query($con,$sql4);
  }
}
$sql3="SELECT * FROM `user` order by `user_id`";
$res1=mysqli_query($con,$sql3);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        while($arr1=mysqli_fetch_assoc($res1))
                        {
                        ?>
                          <tr>
                              <td class='id'><?php echo $arr1['user_id'] ?></td>
                              <td><?php echo $arr1['first_name'] ?>  <?php echo $arr1['last_name'] ?></td>
                              <td><?php echo $arr1['username'] ?></td>
                              <td><?php 
                              if($arr1['role']=='1') 
                               {
                                echo "Admin";
                              }
                              else
                              {
                                echo "User";
                              } ?>
                              </td>
                              <?php
                              echo "<td class='edit'><a href='update-user.php?type=edit&id=".$arr1['user_id']."'><i class='fa fa-edit'></i></a></td>";
                              echo "<td class='delete'><a href='?type=delete&id=".$arr1['user_id']."'><i class='fa fa-trash-o'></i></a></td>";
                              ?>
                          </tr>
                         <?php }?> 
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "header.php"; ?>
