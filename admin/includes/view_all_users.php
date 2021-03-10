<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                       <th>Admin</th>
                                        <th>Client</th> 
                                       <th>Edit</th> 
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                            <tbody>    
                                <?php
                               $query="SELECT * FROM users order by user_id asc";
                               $select_users=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_users)){
                               $user_id=$row['user_id'];
                               $username=$row['username'];  
                               $user_password=$row['user_password'];
                               $user_firstname =$row['user_firstname'];
                               $user_lastname=$row['user_lastname'];   
                               $user_email=$row['user_email'];   
                             //  $user_image=$row['user_image'];   
                               $user_role=$row['user_role'];
                             
                        echo"<tr>";
                                   echo"<td>$user_id</td>";
                                   echo"<td>$username</td>";
                                   echo"<td>$user_firstname</td>";
                                        /*   
                               $query="SELECT * FROM cases WHERE case_id={$post_case_id}";
                               $select_cases_id=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_cases_id)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                               echo"<td>{$case_tittle}</td>";
                               }
                        */
                                  echo"<td>$user_lastname</td>";
                                   echo"<td>$user_email</td>";
                                 // echo"<td>$user_image</td>";
                               // echo"<td><img width='100' src='../images/$user_image' alt='image'></td>";

/*
                              $query="SELECT * FROM police_station WHERE post_id={$comment_post_id}";
                              $select_post_id_query=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_post_id_query)){
                               $post_id =$row['post_id'];
                               $post_city =$row['post_city'];
                               echo"<td> <a href='../post.php?p_id=$post_id'>$post_city</a> </td>";
                       
                               }
                                */
                                echo"<td>$user_role</td>";
                               // echo"<td></td>";

                                                
                    echo"<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                    echo"<td><a href='users.php?change_to_client={$user_id}'>Client</a></td>";        
                   echo"<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                    echo"<td><a onClick=\"javascript: return confirm('Are you Sure you want to delete');\" href='users.php?delete={$user_id}'>Delete</a></td>";

                        echo"</tr>";
                                    
                               }
                                   ?>
                                    
                            
                            </tbody>
                        </table>
                       <?php
if(isset($_GET['change_to_admin'])){
   $the_user_id=$_GET['change_to_admin'];
    $query="UPDATE users SET user_role='Admin' WHERE user_id=$the_user_id ";
    $change_to_admin_query=mysqli_query($con, $query);
    header("Location: users.php");

}

if(isset($_GET['change_to_client'])){
   $the_user_id=$_GET['change_to_client'];
    $query="UPDATE users SET user_role='Client' WHERE user_id=$the_user_id ";
    $change_to_client_query=mysqli_query($con, $query);
    header("Location: users.php");

}



if(isset($_GET['delete'])){
   $the_user_id=$_GET['delete'];
    $query="DELETE FROM users WHERE user_id={$the_user_id} ";
    $delete_user_query=mysqli_query($con, $query);
    header("Location: users.php");
    
}

?>