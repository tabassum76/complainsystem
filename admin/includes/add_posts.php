 <?php
                               $query="SELECT * FROM cases";
                               $select_cas=mysqli_query($con,$query);
                               confirm($select_cas);
                               while($row=mysqli_fetch_assoc($select_cas)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                               
              
                               }
?>
   <?php
    if(isset($_POST['create_post'])){
                               $post_head=$_POST['post_head'];   
                               $post_city =$_POST['post_city'];
//                               $post_case_id =$_POST['post_case'];   
                               $post_status =$_POST['post_status'];
                               $post_case_image=$_FILES['post_case_image']['name']; 
                               $post_case_image_temp=$_FILES['post_case_image']['tmp_name'];   
                               $post_case_off=$_POST['post_case_off'];
                               $post_case_content=$_POST['post_case_content'];   
                               //$post_comment_count ='';
                               $post_case_date=date('d--m-y');   
        
        move_uploaded_file($post_case_image_temp, "C:/wamp64/www/CMS/images/$post_case_image");
$query = "INSERT INTO police_station (post_case_id, post_city, post_head, post_case_date,post_case_image,post_case_content,post_case_off,post_status)";
$query .= "VALUES('{$case_id}','{$post_city}','{$post_head}',now(),'{$post_case_image}','{$post_case_content}','{$post_case_off}', '{$post_status}') ";
        $create_post_query=mysqli_query($con, $query);

        confirm($create_post_query);
        $the_post_id=mysqli_insert_id($con);
  // echo  "<p> Created. <a href='police_station.php'> View Posts</a></p>";
    echo "<p class='bg-success'>Created: <a href='../post.php?p_id={$the_post_id}'>View Post</a>  or  <a href='police_station.php'>Edit More</a></align></p>";

    }
        
            
          ?>      
        <form action="" method="post" enctype="multipart/form-data">   

      <div class="form-group">
         <label for="post_city">Police Station City</label>
          <input type="text" class="form-control" name="post_city">
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
          <input type="text" class="form-control" name="post_head">
      </div>
         <br> 
      <div class="form-group">
         <select name="post_status" id="">
             <option value="draft"> Post Status</option>
             <option value="Published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
        <br> 
      <div class="form-group">
         <label for="post_case_image">Case Image</label>
          <input type="file" name="post_case_image">
      </div>   
        <br> 
      <div class="form-group">
         <label for="post_case_off">PS Case Officer</label>
          <input type="text" class="form-control" name="post_case_off">
      </div> 
       
        <br> 
      <div class="form-group">
         <label for="post_case_content">PS Case Content</label>
          <textarea class="form-control" name="post_case_content" id="" cols="30" rows="10"></textarea>
      </div> 
    <br>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>
</form>