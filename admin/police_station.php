    <?php// "../admin/includes/header.php"?>
    <?php include "C:/wamp64/www/CMS/admin/includes/admin_header.php";?>


    <div id="wrapper">
<?php include "C:/wamp64/www/CMS/admin/includes/navi.php";?>

        <!-- Navigation -->
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom To Admin
                            <small>Author</small>
                        </h1>
                            <?php
                        
    if(isset($_GET['source'])){
       $source=$_GET['source'];
    
    }else{
         $source="";
   }
        switch($source){
            case 'add_posts':
            include "C:/wamp64/www/CMS/admin/includes/add_posts.php";
                break;
            case 'edit_posts':
            include "C:/wamp64/www/CMS/admin/includes/edit_posts.php";

                break;
            case 30:
                echo"nice 30";
                break;
            default:
                include "C:/wamp64/www/CMS/admin/includes/view_all_posts.php";
                break;
                
                
                
        }                
                        
                        
                        
                        ?>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "C:/wamp64/www/CMS/admin/includes/admin_footer.php";?>

    <?php// "../admin/includes/footer.php"?> 
