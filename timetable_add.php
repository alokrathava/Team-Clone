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

    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxFile.php',
                        data: 'dep_id=' + countryID,
                        success: function (html) {
                            $('#state').html(html);
                            $('#city').html('<option value="">Select course first</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select Department first</option>');
                    $('#city').html('<option value="">Select course first</option>');
                }
            });

            $('#state').on('change', function () {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxFile.php',
                        data: 'c_id=' + stateID,
                        success: function (html) {
                            $('#city').html(html);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select course first</option>');
                }
            });

            $('#city').on('change', function () {
                var sem_id = $(this).val();
                //	alert(sem_id);
                if (sem_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxFile.php',
                        data: 'sem_id=' + sem_id,
                        success: function (html) {
                            $('#sub_id').html(html);
                        }
                    });
                } else {
                    $('#sub_id').html('<option value="">Select Sem first</option>');
                }
            });


        });
    </script>
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
                           Create Time Table
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                             <form role="form" method="post" action="timetable_process.php">


                            <?php
                            include('config.php');
                            $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                            $run_query = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($run_query);
                            ?>

                            <div class="ggg">
                                <label for="courseid">Department</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="dep_id" class="form-control" id="country" required>
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
                                </select></div><br>


                            <div class="ggg">
                                <label for="courseid">Course</label>
                                <select name="c_id" class="form-control" id="state" required>
                                    <option value="">Select Department first</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div><br>

                            <div class="ggg">
                                <label for="courseid">Semester</label>
                                <select name="sem_id" class="form-control" id="city" required>
                                    <option value="">Select Semester</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div><br>

                            <div class="ggg">
                                <label for="courseid">Subject</label>
                                <select name="sub_id" class="form-control" id="sub_id" required>
                                    <option value="">Select Subject</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div><br>

                            <div class="ggg">
                                <label for="courseid">Resources</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM resource ";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="res_id" class="form-control" required>
                                    <option value="">Select Resources</option>
                                    <?php
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $re_id = $row['re_id'];
                                            $re_name = $row['re_name'];
                                            echo "<option value='$re_id'>$re_name</option>";
                                        }
                                    }
                                    ?>
                                </select></div><br>

                            <div class="ggg">
                                <label for="courseid">Time Slot</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM time_slots ";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="time_id" class="form-control" required>
                                    <option value="">Select Time</option>
                                    <?php
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $slots_id = $row['slots_id'];
                                            $re_name = $row['s_time'] . ' - ' . $row['e_time'];
                                            echo "<option value='$slots_id'>$re_name</option>";
                                        }
                                    }
                                    ?>
                                </select></div><br>


                            <div class="ggg">
                                <label for="courseid">Day</label>

                                <select name="day" class="form-control" required>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div><br>


                            <div class="ggg">
                                <label for="courseid">Teacher Name</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM teacher_reg ";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">Select Teacher</option>
                                    <?php
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $teacher_id = $row['teacher_id'];
                                            $name = $row['t_name'];
                                            echo "<option value='$teacher_id'>$name</option>";
                                        }
                                    }
                                    ?>
                                </select></div>
                            </br>
                            <div class="form-group">
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
