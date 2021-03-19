<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<head>
    <title>Time Table Generator</title>
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

<script src="jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#department').on('change', function () {

            var departmentID = $(this).val();
            //alert(departmentID);
            if (departmentID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxFile.php',
                    data: 'dep_id=' + departmentID,
                    success: function (html) {
                        $('#course').html(html);
                        $('#semester').html('<option value="">Select course first</option>');
                    }
                });
            } else {
                $('#course').html('<option value="">Select Department first</option>');
                $('#semester').html('<option value="">Select course first</option>');
            }
        });

        $('#course').on('change', function () {
            var courseID = $(this).val();
            //alert(courseID);
            if (courseID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxFile.php',
                    data: 'c_id=' + courseID,
                    success: function (html) {
                        $('#semester').html(html);
                    }
                });
            } else {
                $('#semester').html('<option value="">Select course first</option>');
            }
        });
    });
</script>
<section id="container">
    <?php

    include('top_menu.php');
    include('left_menu.php');

    ?>

    <?php include("config.php");

    if (isset($_GET['delete'])) {

        echo $s_id = $_GET['delete'];

        $select_query = "delete from sem where s_id=$s_id";
        $select_query_run = mysqli_query($conn, $select_query);
    }
    ?>
    <!--sidebar end-->
    <!--main content start-->

    <section id="main-content">

        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">
                    Add Semester
                </header>
                <div class="panel-body">
                    <div class="position-center">


                        <form role="form" method="post" action="sem_process.php">


                            <?php
                            include('config.php');
                            $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                            $run_query = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($run_query);
                            ?>


                            <div class="ggg">
                                <label for="courseid">Select Course</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="dep_id" class="form-control" id="department" required>
                                    <option value="">Select Department</option>
                                    <?php
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $dep_id = $row['dep_id'];
                                            $d_name = $row['d_name'];
                                            echo "<option value='$dep_id'>$d_name</option>";
                                        }
                                    } else {
                                        echo '<option value="">Department not available</option>';
                                    }
                                    ?>
                                </select></div>
                            <br>
                            <div class="ggg">
                                <label for="courseid">Select Department</label>
                                <select name="c_id" class="form-control" id="course" required>
                                    <option value="">Select Course first</option>
                                </select>
                                <div class="select-dropdown"></div>

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="semid">Semester Name </label>
                                <input type="text" name="s_name" class="form-control"
                                       placeholder="Enter Sem" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        </form>


                    </div>

                </div>
            </section>
        </section>

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
