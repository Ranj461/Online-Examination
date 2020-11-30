<!doctype html>
<html lang="en">

<head>
    <title>EPATS - Sign Up</title>
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

<body style="background: #ffffff;">
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="position: relative;top: 10%; left: 5%;">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Sign Up</h4>
                                <p class="card-category">Already have an account? <a href="login.php">Login here!</a></p>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">First Name</label>
                                                <input type="text" name="first_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Profession</label>
                                                <input type="text" name="profession" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Organization</label>
                                                <input type="text" name="organization" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email Address</label>
                                                <input type="email" name="email_id" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary pull-right">Sign Up</button>
                                    <div class="clearfix"></div>
                                    <?php

                                        	
                                            $servername = "localhost:3307";
                                            $username = "root";
                                            $password = "root";
                                            $dbname = "epats";
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password,$dbname);

                                            if (isset($_POST["submit"]))
                                            {
                                            	$s1=$_POST['first_name'];
                                            	$s2=$_POST['last_name'];
                                                $s3=$_POST['email_id'];
                                                $s4=$_POST['password'];
                                                $s5=$_POST['profession'];
                                                $s6=$_POST['organization'];
                                                $sql = "insert into login_details(first_name,last_name,email_id,password,Profession,Organization) values('".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."')";
                                                

                                            if(mysqli_query($conn,$sql))
                                            {
                                            	$name=$s1." ".$s2;
                                            	$sql1="insert into user_details(email_id,name) values('".$s3."','".$name."')";
                                            	if(mysqli_query($conn,$sql1))
                                            	{	
                                            		echo "<script>window.location.href='login.php';
                                                	</script>";
                                                }
                                              
                                            }


                                            else
                                            {

                                               echo "This email Id is already registered.";

                                            }
                                            $conn->close();
                                            }

                                        ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 text-center" style="margin-top: 3rem;">

                        <img src="assets/img/logo.svg" height="450vh">

                        <h2 style="margin-top: 3rem;">English Proficiency Adaptive Test Series</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/demo/demo.js"></script>

</html>
