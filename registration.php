<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php if(isset($_POST['submit'])){
   // echo"its working";
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
    if(!empty($username) && !empty($email) && !empty($password)){
        
        $username=mysqli_real_escape_string($con, $username);
        $email=mysqli_real_escape_string($con, $email);
        $password=mysqli_real_escape_string($con, $password);
        
    $query="SELECT randsalt FROM users";
    $select_randsalt_query=mysqli_query($con, $query);
    if(!$select_randsalt_query){
        die("query failed" .mysqli_error($con));
    }
    while($row=mysqli_fetch_array($select_randsalt_query)){
        $salt=$row['randsalt'];
        $query="INSERT INTO users(username, user_firstname, user_lastname, user_image, user_email, user_password, user_role) ";
        $query.="VALUES('{$username}', '', '', '', '{$email}', '{$password}', 'client')";
        $reg_user_query=mysqli_query($con, $query);
        if(!$reg_user_query){
            die("query failed" .mysqli_error($con) .' '.mysqli_error($con));
        }
        $message="your registration has been submited";
    } 
        
    }else{
                $message="fields can not be empty";

    
    }
 
}else{
    $message="";
}
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
