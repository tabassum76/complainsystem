                                <form action="" method="post">
                               <div class="form-group">
                               <label for="case_tittle">Edit Case</label>
                               <?php 
                                   if(isset($_GET['edit'])){
                                       $case_id=$_GET['edit'];
                               $query="SELECT * FROM cases WHERE case_id=$case_id ";
                               $select_cases_id=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_cases_id)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                              ?> 
        <input value="<?php if(isset($case_tittle)){echo $case_tittle;} ?>" type="text" class="form-control" name="case_tittle" style="margin-left:-16px;color:white; background-color:orange;">   
                            <?php }}?> 
                              <?php 
                             // update query 
                                         if(isset($_POST['Edit_case'])){
                                             $the_case_tittle=$_POST['case_tittle'];
                                             $query="UPDATE cases SET case_tittle='{$the_case_tittle}' WHERE case_id={$case_id} ";
                                             $update_query=mysqli_query($con, $query);
                                             if(!$update_query){
                                                 die("query failed" .mysqli_error($con));
                                             }
                                             header("Location: cases.php"); // refresh the page
                                         } 
                        
                                   ?>
                               
                                </div>
                                <div class="form-group">
                             <!--<input type="text" class="form-control" name="cat_tittle">   -->

                                <input class="btn btn-success" type="submit" name="Edit_case" value="Edit Case">    
                               </div>
                               </form> 
                               
