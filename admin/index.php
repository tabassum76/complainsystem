<?php include "C:/wamp64/www/CMS/admin/includes/admin_header.php";?>
<div id="wrapper">
<?php if($con) echo "conect";?>
<?php include "C:/wamp64/www/CMS/admin/includes/navi.php";?>        
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom To Admin
                            <small><?php echo $_SESSION['user_firstname'];?></small>
                        </h1>           
                    </div>
                </div>
                <!-- /.row -->                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                        $query="SELECT * FROM police_station";
                        $select_all_post=mysqli_query($con, $query);
                        $post_counts=mysqli_num_rows($select_all_post);
                        echo "<div class='huge'>{$post_counts}</div>";
                        ?>
                        <div>Police Station</div>
                    </div>
                </div>
            </div>
            <a href="police_station.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <?php 
                        $query="SELECT * FROM comments";
                        $select_all_comment=mysqli_query($con, $query);
                        $comment_counts=mysqli_num_rows($select_all_comment);
                        echo "<div class='huge'>{$comment_counts}</div>";
                        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                        $query="SELECT * FROM users";
                        $select_all_users=mysqli_query($con, $query);
                        $user_counts=mysqli_num_rows($select_all_users);
                        echo "<div class='huge'>{$user_counts}</div>";
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php 
                        $query="SELECT * FROM cases";
                        $select_all_cases=mysqli_query($con, $query);
                        $cases_counts=mysqli_num_rows($select_all_cases);
                        echo "<div class='huge'>{$cases_counts}</div>";
                        ?>
                         <div>Cases</div>
                    </div>
                </div>
            </div>
            <a href="cases.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div><!-- /.row -->
         
         <?php   
                        $query="SELECT * FROM police_station WHERE post_status='published' ";
                        $select_all_pub_post=mysqli_query($con, $query);
                        $pub_post_counts=mysqli_num_rows($select_all_pub_post);
                                                              
                        $query="SELECT * FROM comments WHERE comment_status='unapproved' ";
                        $select_all_draft_comment=mysqli_query($con, $query);
                        $comment_draft_counts=mysqli_num_rows($select_all_draft_comment);
                       
                        $query="SELECT * FROM police_station WHERE post_status='draft' ";
                        $select_all_draft_post=mysqli_query($con, $query);
                        $post_draft_counts=mysqli_num_rows($select_all_draft_post);
                        
                        $query="SELECT * FROM users WHERE user_role='client' ";
                        $select_all_client_user=mysqli_query($con, $query);
                        $client_user_counts=mysqli_num_rows($select_all_client_user);
                ?>
          <br>
        <div class="row">
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
           <?php
            
$element_text=['Police Station', 'Comments', 'Pending Comments', 'Users','Clent', 'All Cases', 'Published Cases', 'Draft cases'];
$element_count=[$post_counts, $comment_counts, $comment_draft_counts, $user_counts, $client_user_counts,  $cases_counts, $pub_post_counts, $post_draft_counts];
           for($i=0; $i<8; $i++){
    echo"['{$element_text[$i]}'". "," ."{$element_count[$i]}],";
}
            
            ?> 
            
        //  ['Police Station', 1000],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

               
               
           </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "C:/wamp64/www/CMS/admin/includes/admin_footer.php";?>

