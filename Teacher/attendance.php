<!DOCTYPE html>
<head>
    <title></title>
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
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>

    <style type="text/css">
        h5, h6 {
            text-align: center;
        }

        @media print {
            .btn-print {
                display: none !important;
            }

            .panel-heading {
                display: none !important;
            }

            .brand {
                display: none !important;
            }

            .dropdown {
                display: none !important;
            }

        }
    </style>
</head>
<body>

<script src="jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


<section id="container">
    <!--header start-->
    <!--header end-->
    <!--sidebar start-->
    <?php

    include('top_menu.php');
    include('left_menu.php');
    include('config.php');

    $teacher_id = $_SESSION['teacher_id'];
    $department_id = $_SESSION['department_id'];
    $course_id = $_SESSION['course_id'];
    ?>

    <section id="main-content">

        <section class="wrapper">

            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student Attendance
                    </div>
                    <br>
                    <!--                    <table class="table" border="2px;">-->
                    <form class="form-group" action="attendance_process.php" method="post">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Student RollNo</th>
                                <th>Student Name</th>
                                <th>Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                $student_detail = "SELECT * FROM `student_reg` WHERE s_department = '$department_id' AND s_course='$course_id' ";
                                if (isset($conn)) {
                                    $result = $conn->query($student_detail);
                                }
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['s_id'];
                                        $name = $row['s_name'];

                                        echo '<tr>';
                                        echo '<td>' . date("j-F-Y");
                                        '</td>';
                                        echo '<td>' . $id . '</td>';
                                        echo '<td>' . $name . '</td>';
                                        ?>
                                        <input type="hidden" value="<?php echo $id; ?>" name='id[]'>
                                        <?php
                                        echo '<td>
                                                   <select name="attendance[]">
                                                   <option value="0">Present</option>
                                                   <option value="1">Absent</option>
                                                   </select>
                                            </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" value="<?php echo date("j-F-Y"); ?>" name='date'>
                        <input type="hidden" value="<?php echo $id; ?>" name='id[]'>
                        <!--                        <input type="hidden" value="-->
                        <?php //echo $name; ?><!--" name='std_name'>-->
                        <button type="submit" class="btn btn-success btn-block" style="width: 30%; margin: 8px;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
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
