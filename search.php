<?php include "includes/db.php";?>
  <?php include "includes/header.php";?> 
    <!-- Navigation -->
<?php include "includes/navigation.php";?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                  <?php 
                 if(isset($_POST['submit'])){
                $search=$_POST['search'];
                     $query="SELECT * FROM police_station WHERE post_case_off LIKE '%$search%' ";
                      $search_query=mysqli_query($con,$query);
                     if(!$search){
                         die("query failed".mysqli_error($con));
                     }
                     $count=mysqli_num_rows($search_query);
                     if($count==0){
                         echo"<h1> NO RESULT</h1>";
                     }else{                  
                    while($row=mysqli_fetch_assoc($search_query)){
                       $post_id =$row['post_id'];
                       $post_city =$row['post_city'];
                       $post_case_off =$row['post_case_off'];
                       $post_case_date =$row['post_case_date'];
                       $post_case_content =$row['post_case_content'];
                       $post_case_image =$row['post_case_image'];
                        ?>
                <h1 class="page-header">
                    Online Complain Management System
                    <small></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_city?></a>
                </h2>
                <p class="lead">
                    by <?php echo $post_case_off;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_case_date?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_case_image?>" alt="">
                </a>
                <hr>
                <p><?php echo  $post_case_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                  <?php  
                    }
                    } 
                     }
                ?>

                         

            </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
        <?php include "includes/footer.php";?>