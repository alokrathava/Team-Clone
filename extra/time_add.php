<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Responsive_table ::
        w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <!--header end-->
    <!--sidebar start-->
    <?php

    include('top_menu.php');
    include('left_menu.php');

    ?>

    <?php
    include('config.php');
    if (isset($_GET['delete'])) {
        echo $id = $_GET['delete'];
        $sql = "DELETE FROM sub_category WHERE sub_cat_id= '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result === True) {
            header("location:sub_category_add.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
    <!--sidebar end-->
    <!--main content start-->

    <section id="main-content">

        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">

                </header>
                <div class="panel-body">
                    <div class="position-center">


                        <form role="form" method="post" action="time_process.php">


                            <?php
                            include('config.php');
                            $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                            $run_query = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($run_query);
                            ?>
                            <div class="form-group">
                                <label for="Departmentid">Time Slots</label>
                                <input type="texr" name="time" class="form-control" id="slots" placeholder="Enter Dep">

                                <div class="form-group">
                                    <label for="Departmentid">Start Time</label>
                                    <input type="time" name="s_time" class="form-control" id="start"
                                           placeholder="Enter Dep">


                                </div>
                                <div class="form-group">
                                    <label for="courseid">End Time</label>
                                    <input type="time" name="e_time" class="form-control" id="end"
                                           placeholder="Enter Course">
                                </div>

                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        </form>


                    </div>

                </div>
            </section>
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Time Slots
                    </div>
                    <div>
                        <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>


                            <thead>
                            <tr>
                                <th data-breakpoints="xs">Sr</th>
                                <!--<th>Name</th>-->
                                <th>Time Slots</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("config.php");
                            $counter = 1;
                            //$sql = "select * from student_reg";
                            $sql = "SELECT * FROM `time_slots`";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                <tr>

                                    <td><?php echo $counter; ?></td>

                                    <td><?php echo $row['time']; ?></td>
                                    <td><?php echo $row['s_time']; ?></td>
                                    <td><?php echo $row['e_time']; ?></td>

                                    <a href="student_pending_list.php?update=<?php echo $row['student_id']; ?>"
                                       onclick="return confirm('Are You Sure Delete Category?');">

                                    </a>
                                    </td>

                                </tr>

                                <?php
                                $counter++;
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>

    <!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
