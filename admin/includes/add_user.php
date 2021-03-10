<?php
    if(isset($_POST['create_user'])){
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

$query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_role, user_password, user_image, randsalt) ";
$query .= "VALUES('{$user_firstname}','{$user_lastname}', '{$username}', '{$user_email}', '{$user_role}', '{$user_password}', '', '') ";
        $create_user_query=mysqli_query($con, $query);

        confirm($create_user_query);
echo "User Created:"." "." <a href='users.php'> View Users</a>";
    }
          ?>      
        <form action="" method="post" enctype="multipart/form-data">    
        <div class="form-group">
         <label for="user_firstname">Firstname</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>
         <br> 
      <div class="form-group">
         <label for="user_lastname">Lastname</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
      <div class="form-group">
      <select name="user_role" id="">
              <option value='client'>Select Options</option>

               <option value='admin'>Admin</option>
               <option value='client'>Client</option>

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
          <input type="text" class="form-control" name="username">
      </div> 
        <br> 
      <div class="form-group">
         <label for="user_email">Email</label>
         <input type="email" class="form-control" name="user_email">
      </div> 
        <br> 

       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" name="user_password">
      </div> 
    <br>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>
</form>