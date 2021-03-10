              <div class="col-md-4">
                <!-- Blog Search  -->
                <div class="well">
                      <h4>Search</h4>
                      <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text"  class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span><i class="fa fa-search"></i>
</span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                 </div>
                
                <!--Login-->
                <div class="well">
                      <h4> Login</h4>
                      <form action="includes/login.php" method="post">
                    <div class="input-group">
                     <label class="label">Username</label>
                        <input name="username" type="text"  class="form-control" placeholder="Enter Username">
                          </div>
                          <br>
                    <div class="input-group">
                    <label class="label">Password</label>
                  <input name="password" type="password"  class="form-control" placeholder="Enter Password">
                       <div class="input-group">
                       <br>
                   <input class="btn btn-primary" type="submit" name="login" value="Submit">
                     </div>
                   </div>
                    </form>
                  </div>
               

                

                <!-- Blog Categories Well -->
                <div class="well">
                   <?php
                    $query="SELECT * FROM cases LIMIT 4";
                    $select_case_sidebar=mysqli_query($con,$query);
                    ?>
                    <h4>CMS Cases</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">    
                           <?php
                        while($row=mysqli_fetch_assoc($select_case_sidebar)){
                        $case_tittle =$row['case_tittle'];
                        $case_id =$row['case_id'];

                        echo "<li><a href='case.php?case=$case_id'>{$case_tittle}</a></li>";
                        }
                        ?>    
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php //include "includes/widget.php";?>
                </div>