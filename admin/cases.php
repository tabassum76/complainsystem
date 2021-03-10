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
                           <div class="col-xs-6">
                          <?php
                          insert_cases();
                           ?>
                           <form action="" method="post">
                               <div class="form-group">
                               <label for="case_tittle">Add Case</label>
                                <input type="text" class="form-control" name="case_tittle" style="margin-left:-16px;color:white; background-color:orange;">   
                                </div>
                                <div class="form-group-">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Case">    
                               </div>
                               </form>
                               
                               <?php 
                               // update and include
                               if(isset($_GET['edit'])){
                                   $case_id=$_GET['edit'];
                                   include "C:/wamp64/www/CMS/admin/includes/update_case.php";
                               }
                               ?>
                               </div>
                               <!-- Add category form-->
                               <div class="col-xs-6">
                                 <table class="table table-bordered " style="color:white; background-color:orange;">
                                     <thead>
                                         <tr>
                                             <th>Id</th>
                                             <th> Case Tittle</th>
                                             <th>Delete</th>
                                             <th>Edit</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                    
                                    <?php       
                                //find all categories query
                              findallcate();
                                      ?> 
                                      
                                      <?php
                                         // delete query 
                                       deletecate();
                                         
                                         ?>
                                     
                                         
                                     </tbody>
                                 </table>
                                   </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "C:/wamp64/www/CMS/admin/includes/admin_footer.php";?>

    <?php// "../admin/includes/footer.php"?> 
