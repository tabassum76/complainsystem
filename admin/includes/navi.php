<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-user"></i> CMS Admin</a>
            </div>
            
            
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="../index.php"><i class="fa fa-home"></i> Home Site</a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                   <?php 
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }
                        ?>
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-bars"></i> Dashboard</a>
                    </li>
                    <li>
         <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-qrcode"></i> Police Station<i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./police_station.php">View All Police Stations</a>
                            </li>
                            <li>
                                <a href="./police_station.php?source=add_posts">Add Polics Stations</a>
                            </li>
                        </ul>
                    </li>                    <li>
                        <a href="./cases.php"><i class="fa fa-file-o"></i> Cases Record</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i>  Police Officers<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Add Officers</a>
                            </li>
                            <li>
                                <a href="#">Delete Officers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="comments.php"><i class="fa fa-comments"></i> Comments</a>
                    </li>
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#Users"><i class="fa fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Users" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="./users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
