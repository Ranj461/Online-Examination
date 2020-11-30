<!doctype html>
<html lang="en">

<head>
    <title>EPATS - Speaking Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="icon" href="assets/img/logo.svg">

    <!-- Material Kit CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <img src="assets/img/logo.svg">
                </a>
                <a href="#" class="simple-text logo-normal">
                    English Proficiency <br />Adaptive Test Series
                    <br /> ADMIN PANEL
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="material-icons">person</i>
                            <p>My Profile</p>
                        </a>
                    </li>
-->
                    <!--
					<li class="nav-item">
						<a class="nav-link" href="#0">
							<i class="material-icons">menu_book</i>
							<p>Reading</p>
						</a>
					</li>
-->
                    <li class="nav-item">
                        <a class="nav-link" href="admin-writing.php">
                            <i class="material-icons">create</i>
                            <p>Writing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-speaking.php">
                            <i class="material-icons">record_voice_over</i>
                            <p>Speaking</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin-reading.php">
                            <i class="material-icons">menu_book</i>
                            <p>Reading</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogin.php">
                            <i class="material-icons">power_settings_new</i>
                            <p>Log Out</p>
                        </a>
                    </li>
                    <!-- your sidebar here -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">person</i>

                                    <?php
                                    // session_start();
                                    echo $_SESSION['login_user'];
                                    // echo $_SESSION['userid'];
                                    ?>
                                </a>
                            </li>
                            <!-- your navbar here -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <!-- your content here -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title">Add Question</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <!-- Question Answer Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Question</label>
                                                    <input type="text" name="q1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Question Answer End -->

                                        <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                                        <div class="clearfix"></div>


                                        <?php


                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "root";
                                            $dbname = "epats";
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password,$dbname);

                                            if (isset($_POST["submit"]))
                                            {
                                                
                                              $s1=$_POST['q1'];
                                                $sql = "insert into speaking(sq1) values('".$s1."')";

                                            if(mysqli_query($conn,$sql))
                                            {
                                                
                                              echo "Successful";
                                            }
                                                    

                                            else
                                            {

                                               echo "Not successful";

                                            }
                                            $conn->close();
                                            }

                                            ?>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/demo/demo.js"></script>
<script src="script.js"></script>

</html>
