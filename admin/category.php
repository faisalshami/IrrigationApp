<?php 
require "header.php"; 
require "function.php";
 ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <tbody>
                   <tr>
                       <td id="get"></td>
                   </tr> 
                   </tbody>
                </table>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 function loadTable(page)
 {
   $.ajax({
   url:"loadmore.php",
   type:"POST",
   data:{pages:page},
   success:function(data)
   {
    if(data)
    {
      $("#pagination").remove();
     $("#get").append(data);
    }
    else
    {
      $("#more").prop("disabled",true);
    }
   }
   });
 } 
 loadTable(); 
 $(document).on("click","#more",function(e){
e.preventDefault();
var page_no=$(this).data("id");
alert(page_no);
loadTable(page_no);
}); 
});
$(document).on("click",".del",function(){
  var idd=$(this).data("id");
  var iid=this;
  $.ajax({
    url:"delt.php",
    type:"POST",
    data:{eid:idd},
    success:function(data)
    {
      if(data==1)
      {
        $(iid).closest("tr").fadeOut();
      }
      else
        {
          alert('data is not delete');
        }  
    }
  });
});


</script>

            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
