<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>EPATS - Dashboard</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#0">
                            <i class="material-icons">person</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
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
                                    // echo $_SESSION['userid'];
                                    ?>
                                    <?php
                $servername = "localhost:3307";
                $username = "root";
                $password = "root";
                $dbname = "epats";
                // Create connection
                $conn = new mysqli($servername, $username, $password,$dbname); 
                

                
                // echo $id;
                $id=$_SESSION['userid'];
                //$id = 1;
                //$id=$_SESSION['userid'];
                //a: $qid=mt_rand(1,5);
                //$check="select * from writing_score where user_id=$id;";
                $sql="select * from writing_score where user_id=$id;";
                $myfile = fopen("marks2.txt", "w");
                if(mysqli_query($conn,$sql))
                {$i = 0;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) 
                {   
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        
                        fwrite($myfile, $row['marks']);
                        fwrite($myfile, ",");
                        
                        $i++;
                    }
                }
                }
                else
                {
                    echo "error";
                }
                $sql1="select * from speaking_score where user_id=$id;";
                $myfile = fopen("marks3.txt", "w");
                if(mysqli_query($conn,$sql1))
                {$j = 0;
                $result = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result) > 0) 
                {   
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        
                        fwrite($myfile, $row['marks']);
                        fwrite($myfile, ",");
                        
                        $j++;
                    }
                }
                }
                else
                {
                    echo "error";
                }
                $sql1="select * from reading_score where user_id=$id;";
                $myfile = fopen("marks4.txt", "w");
                if(mysqli_query($conn,$sql1))
                {$k = 0;
                $result = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result) > 0) 
                {   
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        
                        fwrite($myfile, $row['marks']);
                        fwrite($myfile, ",");
                        
                        $k++;
                    }
                }
                }
                else
                {
                    echo "error";
                }
             
             
                fclose($myfile);
                $score = shell_exec("python graph.py ");
                $score2 = shell_exec("python graph2.py ");
                $score3 = shell_exec("python graph3.py ");
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header card-header-warning">
                                    <div class="ct-chart" id="websiteViewsChart">
                                        <!--INSERT GRAPH HERE-->
                                        <img src="myfig.png" class="img-fluid" id="myImage"> </div>
                                    <div class="text-center">
                                        <button class="btn btn-success" onclick="document.getElementById('myImage').src='myfig.png'">Writing</button>
                                        <button class="btn btn-success" onclick="document.getElementById('myImage').src='myfig2.png'">Speaking</button>
                                        <button class="btn btn-success" onclick="document.getElementById('myImage').src='myfig3.png'">Reading</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title text-center">Your Performance</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title">Student Stats</h4>
                                    <p class="card-category">Based on Recent Tests</p>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Test</th>
                                            <th>Tests Appeared</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Writing Test</td>
                                                <td><?php echo $i; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Speaking Test</td>
                                                <td><?php echo $j; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Reading Test</td>
                                                <td><?php echo $k; ?></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <a href="quiz.php"><button type="submit" name="submit" class="btn btn-success pull-right">Take more Tests</button></a>

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
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });

</script>

</html>
