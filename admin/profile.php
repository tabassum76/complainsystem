<?php include "C:/wamp64/www/CMS/admin/includes/admin_header.php";?>
<?php 
if(isset($_SESSION['username']))
{
   $username=$_SESSION['username'];
    $query="SELECT * FROM users WHERE username='{$username}' ";
    $select_user_profile_query=mysqli_query($con, $query);
    while($row=mysqli_fetch_array($select_user_profile_query)){
                               $user_id=$row['user_id'];
                               $username=$row['username'];  
                               $user_password=$row['user_password'];
                               $user_firstname =$row['user_firstname'];
                               $user_lastname=$row['user_lastname'];   
                               $user_email=$row['user_email'];     
                               $user_role=$row['user_role'];
    }
}
?>
<?php 
    if(isset($_POST['edit_user'])){
                               // $user_id =$_POST['user_id'];
                               $username=$_POST['username'];   
                               $user_firstname=$_POST['user_firstname'];
                               $user_lastname =$_POST['user_lastname'];   
                              // $user_image=$_FILES['user_image']['name']; 
                              // $user_image_temp=$_FILES['user_image']['tmp_name'];   
                               $user_email=$_POST['user_email'];
                               $user_role=$_POST['user_role'];   
                               $user_password=$_POST['user_password'];   
        //move_uploaded_file($user_image_temp, "C:/wamp64/www/CMS/images/$user_image");
          $query = "UPDATE users SET ";
          $query .="username = '{$username}', ";
          $query .="user_firstname = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_password   = '{$user_password}', ";
          $query .="user_email= '{$user_email}', ";
          $query .="user_role  = '{$user_role}' ";
          $query .= "WHERE username= '{$username}' ";
        $update_user_query = mysqli_query($con,$query);
        confirm($update_user_query);
//echo "Updated:"." "." <a href='users.php'> View Users</a>";

    }

?>
    <div id="wrapper">
<?php include "C:/wamp64/www/CMS/admin/includes/navi.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom To Admin
                            <small>Author</small>
                        </h1>
                            <form action="" method="post" enctype="multipart/form-data">    
        <div class="form-group">
         <label for="user_firstname">Firstname</label>
          <input type="text" value="<?php echo $user_firstname;?>" class="form-control" name="user_firstname">
      </div>
         <br> 
      <div class="form-group">
         <label for="user_lastname">Lastname</label>
          <input type="text" value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname">
      </div>
      <div class="form-group">
      <select name="user_role" id="">
              <option value='<?php echo $user_role;?>'><?php echo $user_role;?></option>
<?php  
     if($user_role=='admin') {
                echo   "<option value='client'>Client</option>";  
     }  else{
            echo  "<option value='admin'>Admin</option>";
     }  
          ?>
           </select>
            </div>
        <br> 
        <!--
    <div class="form-group">
         <label for="user_image">User Image</label>
          <input type="file" name="user_image">
      </div>   
        <br>  -->
      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" value="<?php echo $username;?>" class="form-control" name="username">
      </div> 
        <br> 
      <div class="form-group">
         <label for="user_email">Email</label>
         <input type="email" value="<?php echo $user_email;?>" class="form-control" name="user_email">
      </div> 
        <br> 

       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" value="<?php echo $user_password;?>" class="form-control" name="user_password">
      </div> 
    <br>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
      </div>
</form>  
               </div>
                </div>
            </div>
        </div>
<?php include "C:/wamp64/www/CMS/admin/includes/admin_footer.php";?>