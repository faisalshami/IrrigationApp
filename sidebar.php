<?php
//require "function.php";
$con=mysqli_connect("localhost","root","","news");
$incr="0";
$sql="SELECT * FROM `post` order by `post_id` desc";
$res1=mysqli_query($con,$sql);

?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php 
        while($row=mysqli_fetch_assoc($res1))
            {
                $pi=$row['post_img'];
            ?>
            <?php 
             if($incr<='4')
             {
            ?>        
        <div class="recent-post">
            <a class="post-img" href='single.php?id=<?php echo $row['post_id']?>'>
                <img src="<?php echo 'pic/'.$pi?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $row['post_id']?>"><?php echo $row['title']?></a></h5>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date']?>
                    <?php $incr++; ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $row['post_id']?>">read more</a>
            </div>
        </div>
    <?php } ?>
        <?php } ?>    
    </div>
    <!-- /recent posts box -->
</div>
