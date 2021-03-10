<?php
if(isset($_GET['p_id'])){
    
   $the_post_id=$_GET['p_id']; 
    
    
}
                               $query="SELECT * FROM police_station where  post_id=$the_post_id";
                               $select_posts_by_id=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_posts_by_id)){
                               $post_id=$row['post_id'];
                               $post_head=$row['post_head'];   
                               $post_city =$row['post_city'];
                               $post_case_id =$row['post_case_id'];   
                               $post_status =$row['post_status'];
                               $post_case_image=$row['post_case_image'];   
                               $post_case_off=$row['post_case_off'];
                               $post_comment_count=$row['post_comment_count'];
                               $post_case_date=$row['post_case_date'];  
                               $post_case_content=$row['post_case_content'];  

                               }
if(isset($_POST['update_post']))
{
    //if (!file_exists("C:/wamp64/www/CMS/images/$post_case_image")) {
   // mkdir("C:/wamp64/www/CMS/images/$post_case_image",0700,true);
   // }
    
    
                               $post_head=$_POST['post_head'];   
                               $post_city =$_POST['post_city'];
                               $post_case_id=$_POST['post_case'];   
                               $post_status =$_POST['post_status'];
                               $post_case_image=$_FILES['post_case_image']['name'];
                               $post_case_image_temp=$_FILES['post_case_image']['tmp_name'];   
                               $post_case_off=$_POST['post_case_off'];
                               $post_case_content=$_POST['post_case_content'];   
                              // $post_comment_count =4;
                              $post_case_date=date('d--m-y'); 
                   move_uploaded_file($post_case_image_temp, "C:/wamp64/www/CMS/images/$post_case_image");
        if(empty($post_case_image)){
        $query="SELECT * FROM police_station WHERE post_id=$the_post_id";
        $select_imag=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($select_imag)){
           $post_case_image=$row['post_case_image'];
        }
    }
          $query = "UPDATE police_station SET ";
          $query .="post_city  = '{$post_city}', ";
        //  $query .="post_case_id = '{$post_case_id}',  ";
          $query .="post_case_date   =  now(), ";
          $query .="post_head = '{$post_head}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_case_off   = '{$post_case_off}', ";
          $query .="post_case_content= '{$post_case_content}', ";
          $query .="post_case_image  = '{$post_case_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";
        
        $update_post = mysqli_query($con,$query);
        
        confirm($update_post);
    echo "<p class='bg-success'>Edited: <a href='../post.php?p_id={$the_post_id}'>View Post</a>  or  <a href='police_station.php'>Edit More</a></align></p>";

}


?>
     
        <form action="" method="post" enctype="multipart/form-data">    
      <div class="form-group">
         <label for="post_city">Police station city</label>
          <input value="<?php echo $post_city;?>" type="text" class="form-control" name="post_city">
      </div>
         <br>  
      <div class="form-group">
           <select name="post_case" id="">
            
               <?php
                   $query="SELECT * FROM cases";
                               $select_cas=mysqli_query($con,$query);
                               confirm($select_cas);
                               while($row=mysqli_fetch_assoc($select_cas)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                               
               echo"<option value=''>{$case_tittle}</option>";
                               }
               
               ?>
           </select>
            </div>
          <br> 
      <div class="form-group">
         <label for="post_head">PS Head</label>
          <input value="<?php echo $post_head;?>" type="text" class="form-control" name="post_head">
      </div>
         <br>
            <div class="form-group">
            <select name="post_status" id="">
            <option value='<?php echo $post_status;?>'><?php echo $post_status ;?></option>
     <?php  
     if($post_status=='Published') {
                echo   "<option value='draft'>Draft</option>";  
     }  else{
            echo  "<option value='published'>Published</option>";

     }  
          ?>

           </select>
          
      </div>
        <br> 
      <div class="form-group">
      <input type="file"   name="post_case_image">
    <img width="100" height='100' src="C:/wamp64/www/CMS/images/<?php echo $post_case_image;?>" alt="image">           
           </div>   
        <br> 
      <div class="form-group">
         <label for="post_case_off"> PS Case Officer</label>
          <input value="<?php echo $post_case_off;?>" type="text" class="form-control" name="post_case_off">
      </div> 
        <br> 
      <div class="form-group">
         <label for="post_case_content">PS Case Content</label>
          <textarea class="form-control" name="post_case_content" id="" cols="30" rows="10"><?php echo $post_case_content;?></textarea>
      </div> 
    <br>
      <div class="form-group">
          <input   class="btn btn-primary" type="submit" name="update_post" value="Edit Post">
      </div>
</form>