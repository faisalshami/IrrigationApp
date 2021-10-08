<?php
require "header.php"; 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form id="yes">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" placeholder="Category Name" id="cat">
                      </div>
                      <h4 style="color:red;"><div id="pass"></div></h4></br>
                      <button class="submit">submit</button>

                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(document).on("click",".submit",function(e){
e.preventDefault();
    var category=$("#cat").val();
    if(category=="")
    {
     $("#pass").html("name is required");    
    }
    else
    {
    $.ajax({
      url:"add.php",
      type:"POST",
      data:{category:category},
      success:function(data)
      {
         if(data==1)
         {
            window.location.href='category.php';
         }
         else
         {
           alert('incorrect');
         }
      }
    });
  }
  });
 </script> 
<?php include "footer.php"; ?>
