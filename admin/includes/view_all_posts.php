 <?php
if(isset($_POST['checkBoxArray'])) {
                             foreach($_POST['checkBoxArray'] as $postidvalue){
                                 $bulk_options=$_POST['bulk_options'];
                                 switch($bulk_options){
                                     case 'Published':
                                         $query=" UPDATE police_station SET post_status='{$bulk_options}' WHERE post_id='{$postidvalue}' ";
                                         $update_to_published=mysqli_query($con,$query);
                                         confirm($update_to_published);
                                         break;
                                          case 'draft':
                                         $query=" UPDATE police_station SET post_status='{$bulk_options}' WHERE post_id='{$postidvalue}' ";
                                         $update_to_draft=mysqli_query($con,$query);
                                         confirm($update_to_draft);
                                         break;
                                          case 'delete':
                                         $query=" DELETE FROM police_station WHERE post_id='{$postidvalue}' ";
                                         $update_to_delete=mysqli_query($con,$query);
                                         confirm($update_to_delete);
                                         break;
                                 }
                             }
                             }                           
                              
                              ?>
                              <form action="" method="post">
                               <table class="table table-bordered table-hover">
                               <div id="bulkOptionContainer" class="col-xs-8">
<select class="form-control" name="bulk_options" id="" style="margin-left:-16px;color:white; background-color:orange;">
                                      <option value="">Select Options</option>
                                      <option value="Published">Publish</option>
                                      <option value="draft">Draft</option>
                                      <option value="delete">Delete</option>
                                  </select>
                                  <br>
                               </div>
                            <div class="col-xs-4">
                            <input type="submit" name="submit" class="btn btn-success" value="Apply">
                            <a class="btn btn-primary" href="./police_station.php?source=add_posts"> Add New</a>
                            </div>
                                <thead>
                                    <tr>
                                <th><input id="selectAllBoxes" type="checkbox"></th>
                                        <th>Id</th>
                                        <th>Police Head</th>
                                        <th>City Name</th>
                                        <th>Case Tittle</th>
                                        <th>Case Status</th>
                                        <th>Case Image</th>
                                        <th>Case Officer</th>
                                        <th>Comments</th>
                                        <th>Case Date</th>
                                        <th>View Post</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <?php
                               $query="SELECT * FROM police_station order by post_id asc";
                               $select_posts=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_posts)){
                               $post_id=$row['post_id'];
                               $post_head=$row['post_head'];   
                               $post_city =$row['post_city'];
                               $post_case_id =$row['post_case_id'];   
                               $post_status =$row['post_status'];
                               $post_case_image=$row['post_case_image'];   
                               $post_case_off=$row['post_case_off'];
                               $post_comment_count=$row['post_comment_count'];
                               $post_case_date=$row['post_case_date'];   
                        echo"<tr>";
                                   ?>
                                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                  <?php
                                   echo"<td>$post_id</td>";
                                   echo"<td>$post_head</td>";
                                   echo"<td>$post_city</td>";
                               $query="SELECT * FROM cases WHERE case_id={$post_case_id}";
                               $select_cases_id=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_cases_id)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                               echo"<td>{$case_tittle}</td>";
                               }
                                   echo"<td>$post_status</td>";
                                   echo"<td><img width='100' src='../images/$post_case_image' alt='image'></td>";
                                   echo"<td>$post_case_off</td>";
                                   echo"<td>$post_comment_count</td>";
                                   echo"<td>$post_case_date</td>";
                    echo"<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";

                    echo"<td><a href='police_station.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
                    echo"<td><a onClick=\"javascript: return confirm('Are you Sure you want to delete');\" href='police_station.php?delete={$post_id}'>Delete</a></td>";

                        echo"</tr>";
                                    
                               }
                                   ?>
                            </tbody>
                        </table>
                        </form>

                       <?php
if(isset($_GET['delete'])){
   $the_post_id=$_GET['delete'];
    $query="DELETE FROM police_station WHERE post_id={$the_post_id} ";
    $delete_query=mysqli_query($con, $query);
    header("Location: police_station.php");
    
}

?>