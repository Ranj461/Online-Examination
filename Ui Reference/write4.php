<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>EPATS Writing Test</title>
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
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <img src="assets/img/logo.svg">
                </a>
                <a href="#" class="simple-text logo-normal">
                    English Proficiency <br />Adaptive Test Series
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="material-icons">person</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="quiz.php">
                            <i class="material-icons">ballot</i>
                            <p>Take Quiz</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="updateprofile.php">
                            <i class="material-icons">update</i>
                            <p>Update Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="changepassword.php">
                            <i class="material-icons">https</i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">
                            <i class="material-icons">record_voice_over</i>
                            <p>FAQs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="help.php">
                            <i class="material-icons">donut_large</i>
                            <p>Help</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <?php
                                        // session_start();
                                        echo $_SESSION['login_user'];
                                         
                                         // echo $next;
                                        // echo $_SESSION['userid'];
                                    ?>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
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
                        <div class="col-md-10">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">
                                        Writing Test
<!--                                        <p class="pull-right">Time Left : <span id="countdown"></span></p>-->
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form id="writing" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="bmd-label-floating" style="font-size: 18px;">
                                                    <!-- <button class="btn btn-lg btn-primary pull-right" id="start-record-btn" name="click" type="Submit">Submit</button><br><br> -->

                                                    <?php
                                                        $servername = "localhost:3307";
                                                        $username = "root";
                                                        $password = "root";
                                                        $dbname = "epats";
                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password,$dbname); 
                                                        $id=$_SESSION['userid'];
                                                        $grp=$_SESSION['wgroup'];
                                                        $qid=$_SESSION['question3'];

                                                        echo "question 4 : qid: ".$qid;

                                                        $sql="select * from writing where wid=$qid;";
                                                        if(mysqli_query($conn,$sql))
                                                        {
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0) 
                                                        {
                                                            while($row = mysqli_fetch_assoc($result)) 
                                                            {

                                                                echo " Question is : ".$row['question'];
                                                            }
                                                        }
                                                
                                                    else
                                                    {
                                                        echo "error";
                                                    }
                                                    }

                                                    

                                                        ?>


                                                </label>
                                            </div>
                                        </div>
                                        <div class="row app">
                                            <div class="col-md-12">
                                                <form action="writing.php" method="post">
                                                    <label class="bmd-label-floating" for="male"></label>
                                                    <div class="form-group input-single">
                                                        <textarea class="form-control" id="note-textarea" placeholder="Create a new note by typing." rows="6" name="answer"></textarea>
                                                    </div>
                                                    <button class="btn btn-md btn-primary pull-right" id="submit_answer" name="submit" type="Submit">Submit</button><br><br>
                                                    <?php
                                                    // print_r($_SESSION['group']);
                                                    if (isset($_POST["submit"]))
                                                        {   
                                                            $txt = "";
                                                    if(isset($_POST['answer']) ){
                                                    $txt = $_POST["answer"];
                                                    
                                                    $fp = fopen('lidn.txt', 'w');
                                                    fwrite($fp, $txt);
                                                    fclose($fp);
                                                    $nexttest = 3;
                                                    $score = shell_exec("python score.py ");

                                                    // echo $score;

                                                    $sentiment = shell_exec("python senti.py ");


                                                    $score = (int)$score;
                                                    $nexttest = shell_exec("python adapt.py 3 $score");
                                                    $_SESSION['wscore4']=$score;
                                                    $_SESSION['wsent4']=$sentiment;
                                                }
                                                    // echo $nexttest;
                                                            // echo $id;
                                                            date_default_timezone_set('Asia/Kolkata');
                                                            $date = date( 'Y-m-d H:i:s ', time () );
                                                            $sql = "insert into writing_score values(".$qid.",".$id.",'".$date."',".$score.",'".$sentiment."')";

                                                            if(mysqli_query($conn,$sql))
                                                            {
                                                                // $_SESSION['w3']= $nexttest;
                                                                 echo "<script>window.location.href='write_score.php';
                                                                    </script>";
                                                                    
                                                            }
                                                            else
                                                            {
                                                                echo "error";
                                                            }
                                                        }

                                                    ?>

                                                </form>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
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
<script src="assets/js/readingtimer.js"></script>

</html>
