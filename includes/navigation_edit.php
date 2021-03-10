    <?php 
    // if(isset($_SESSION['user_role'])){
     if(isset($_GET['p_id'])){
     $the_post_id=$_GET['p_id'];
     //echo "<li><a href='CMS/admin/police_station.php?source=edit_posts&p_id={$the_post_id}'>Edit Post</a></li>";
       
    }
  // }
?>    
   
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> CMS</a>
                <a class="navbar-brand" href="#"><i class=""></i> About</a>
                <a class="navbar-brand" href="#"><i class=""></i> Services</a>
                <a class="navbar-brand" href="#"><i class=""></i> Login</a>
                <a class="navbar-brand" href="#">Contact  <i class="fa fa-phone"></i></a>
                <a href="admin" class="navbar-brand" href="#"> Admin  <i class="fa fa-user"></i></a>                     
                 <a href="http://localhost/CMS/admin/police_station.php?source=edit_posts&p_id=  <?php  echo $the_post_id;?>" class="navbar-brand" >Edit Post  <i class="fa fa-pencil">
                     </i></a>
         </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
            <!--<?php 
            $query="SELECT * FROM cases LIMIT 4";
                    $select_all_case_query=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($select_all_case_query)){
                       $case_tittle =$row['case_tittle'];
                        echo "<li><a href='#'>{$case_tittle}</a></li>";
                    }
                    ?>    -->             
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
