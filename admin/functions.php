<?php 
function confirm($result){
    global $con;
    if(!$result){
    die("query failed". mysqli_error($con));
            
        }
    }


                     function insert_cases(){
                         global $con;
                                if(isset($_POST['submit'])){
                                  $case_tittle =$_POST['case_tittle'];
                                 if($case_tittle =="" ||empty($case_tittle)){
                                     echo"This Field should not be empty";
                                 }else{
                                   $query="INSERT INTO cases(case_tittle) ";
                                     $query.= "VALUE('{$case_tittle}') ";
                                     $create_case_query=mysqli_query($con,$query);
                                     if(!$create_case_query){
                                         die('Query Failed'. mysqli_error($con));
                                     }
                                 }  
                               }
                     }
        function findallcate(){
                  global $con;
                               $query="SELECT * FROM cases";
                               $select_cases=mysqli_query($con,$query);
                               while($row=mysqli_fetch_assoc($select_cases)){
                               $case_tittle =$row['case_tittle'];
                               $case_id =$row['case_id'];
                                   echo"<tr>";
                                echo "<td>{$case_id}</td>";
                                echo "<td>{$case_tittle}</td>";
                                echo "<td><a onClick=\"javascript: return confirm('Are you Sure you want to delete');\" href='cases.php?delete={$case_id}'>Delete</a></td>";
                                echo "<td><a href='cases.php?edit={$case_id}'>Edit</a></td>";

                                   echo"</tr>";

                                  }
    
    
    
}

                           function deletecate(){
                                 global $con;
                                             if(isset($_GET['delete'])){
                                             $the_case_id=$_GET['delete'];
                                             $query="DELETE FROM cases WHERE case_id={$the_case_id} ";
                                             $delete_query=mysqli_query($con, $query);
                                             header("Location: cases.php");
                                         }
    
    
}

?>