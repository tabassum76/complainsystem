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
            $query="SELECT * FROM police_station";
                    $select_all_post_query=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($select_all_post_query)){
                       $post_city =$row['post_city'];
                       //$post_case_id =$row['post_case_id'];
                       $post_id =$row['post_id'];
                       $post_case_off =$row['post_case_off'];
                       $post_case_date =$row['post_case_date'];
                       $post_case_content =substr($row['post_case_content'],0,100);
                       $post_case_image =$row['post_case_image'];
                       $post_status =$row['post_status'];
if($post_status == 'Published'){
    
                        
                        ?>
                <h1 class="page-header">
                    Online Complain Management System
                    <small></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_city?></a>
                </h2>
                <p class="lead">
                    by <?php echo $post_case_off?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_case_date?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_case_image?>" alt="">
                </a>
                <hr>
                <p><?php echo  $post_case_content?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                  <?php  }
                    }
                ?>

            </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
        <?php include "includes/footer.php";?>