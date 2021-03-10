<?php include "includes/db.php";?>
<?php include "includes/header.php";?> 
    <!-- Navigation -->
<?php include "includes/navigation_edit.php";?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                  <?php 
                if(isset($_GET['p_id'])){
                    $the_post_id=$_GET['p_id'];
                }
                
            $query="SELECT * FROM police_station WHERE post_id=$the_post_id";
                    $select_all_post_query=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($select_all_post_query)){
                       $post_city =$row['post_city'];
                       $post_case_off =$row['post_case_off'];
                       $post_case_date =$row['post_case_date'];
                       $post_case_content =$row['post_case_content'];
                       $post_case_image =$row['post_case_image'];
                       $post_comment_count =$row['post_comment_count'];

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
                    by <?php echo $post_case_off?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_case_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_case_image?>" alt="">
                <hr>
                <p><?php echo  $post_case_content?></p>

                <hr>

                  <?php  } ?>
            <!-- Blog Comments -->

                  <?php 
                if(isset($_POST['create_comment'])){
                   $the_post_id=$_GET['p_id'];
                $comment_author=$_POST['comment_author'];
                $comment_email=$_POST['comment_email'];
                $comment_content=$_POST['comment_content'];
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
    
$query="INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_status, comment_content, comment_date) ";
$query.="VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', 'Unapproved',
'{$comment_content}',  now())";
             $create_comment_query=mysqli_query($con,$query);
                    if(!$create_comment_query){
                        die('query failed'.mysqli_error($con));
                    }
                    
$query="SELECT post_comment_count FROM police_station where post_id =$the_post_id";
$select_com=mysqli_query($con,$query);
                       while($row=mysqli_fetch_assoc($select_com)){
                       $com_count =$row['post_comment_count'];
                           $x=$com_count + 1;
//                               echo $x;
$query="UPDATE police_station SET post_comment_count= $x  ";
$query.= "WHERE post_id=$the_post_id ";
$update_comment_count=mysqli_query($con,$query);
                       }
//$com_count=mysqli_num_rows($select_com) ;                                           
//$x= $com_count++;
                    
                    }else {
                        echo "<script>alert('Field cannot be empty')</script>";
                    }
                 

                }
                
                
                ?>
                  <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                    
                     <div class="form-group">
                          <label for="Author">Author</label>
                           <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                        <label for="Email">Email</label>
                           <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                           <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php
                $query="SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
                $query.="AND comment_status= 'approved' ";
                $query.= "ORDER BY comment_id DESC ";
                $select_comment_query=mysqli_query($con,$query);
                 if(!$select_comment_query){
                        die('query failed'.mysqli_error($con));
                    }
                while($row=mysqli_fetch_assoc($select_comment_query)){
                $comment_date=$row['comment_date'];
                $comment_author=$row['comment_author'];
                $comment_content=$row['comment_content'];
              ?> 
                   
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo " " .$comment_date; ?></small>
                        </h4>
                      <?php echo  $comment_content; ?>
                    </div>
                </div>
            
                   
                    <?php }
                ?> 
                
            </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
        <?php include "includes/footer.php";?>
            </div>
</div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
     

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
