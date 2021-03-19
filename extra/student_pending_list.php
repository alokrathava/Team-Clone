<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location:index.php');
}


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

//if (isset($_GET['Aproval'])) {
//
//    $id = $_GET['Aproval'];
//    $select_query = "update student_reg set status=1 where student_id=$id";
//    $result = mysqli_query($conn, $select_query);
//    if ($result) {
//        echo "<script>window.open('student_pending_list.php','_self')</script>";
//    }
//}
//
//
//if (isset($_GET['Reject'])) {
//
//    $id = $_GET['Reject'];
//    $select_query = "update student_reg set status=2 where student_id=$id";
//    $result = mysqli_query($conn, $select_query);
//    if ($result) {
//        echo "<script>window.open('student_pending_list.php','_self')</script>";
//    }
//}


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
    <script type="text/javascript">
        <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script>
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

    <!--sidebar end-->

    <section id="main-content">

        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading">
                    Add Student
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action="addmission_process.php">
                            <div class="form-group">
                                <label for="courseid">Student Name</label>
                                <input type="text" name="stud_name" class="form-control" id="semid" required>
                            </div>
                            <div class="form-group">
                                <label for="courseid">Phone Number</label>
                                <input type="number" name="stud_contact_no" class="form-control" id="semid" required>
                            </div>
                            <div class="form-group">
                                <label for="courseid">Student Address</label>
                                <textarea class="form-control" rows="5" name="address">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="courseid">Email</label>
                                <input type="email" name="stud_email" class="form-control" id="semid" required>
                            </div>
                            <div class="form-group">
                                <label for="courseid">Parent Email</label>
                                <input type="email" name="parent_email" class="form-control" id="semid" required>
                            </div>
                            <div class="form-group">
                                <label for="courseid">Password</label>
                                <input type="password" name="stud_password" class="form-control" id="semid" required>
                            </div>
                            <div class="ggg">
                                <label for="courseid">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <br>
                            <?php
                            include('config.php');
                            $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                            $run_query = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($run_query);
                            ?>


                            <div class="ggg">
                                <label for="courseid">Seelct Department</label>
                                <?php
                                include('config.php');
                                $query = "SELECT * FROM deparment  ORDER BY d_name ASC";
                                $run_query = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($run_query);
                                ?>
                                <select name="did" class="form-control" id="country">
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
                            <div class="ggg">
                                <label for="courseid">Select Course</label>
                                <select name="cid" class="form-control" id="state">
                                    <option value="">Select Department first</option>
                                </select>
                                <div class="select-dropdown"></div>

                            </div>
                            <!--                            <div class="form-group">-->
                            <!--                                <label for="semid">Semester</label>-->
                            <!--                                <select name="semid" class="form-control" id="state">-->
                            <!--                                    --><?php
                            //                                        $select_sem = "SELECT * FROM `sem`";
                            //                                        $sem = $conn->query($select_sem);
                            //                                        if ($sem->num_rows>0)
                            //                                        {
                            //                                            while ($rsem = $sem->fetch_assoc())
                            //                                            {
                            //                                                $s_id = rsem['s_id'];
                            //                                                $s_name = rsem['s_name'];
                            ////                                                echo $s_id,$s_name;
                            //                                                echo '<option value="'.$s_id.'">'.$s_name.'</option>';
                            //                                            }
                            //                                        }else{
                            //                                            echo '<option value="">Semester Not Added Yet</option>';
                            //                                        }
                            //                                    ?>
                            <!--                                </select>-->
                            <!--                                <div class="select-dropdown"></div>-->
                            <!--                            </div>-->
                            <br>
                            <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
            <!--main content start-->
            <!--            <section id="main-content">-->
            <!--                <section class="wrapper">-->
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student List
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Course</th>
                                <!--                                <th>Sem</th>-->
                                <!--                                <th>Action</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("config.php");
                            $counter = 0;
                            $sql = "select * from student_reg";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                <tr>

                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php $depid = $row['dep_id'];
                                        $q1 = "SELECT * FROM deparment where dep_id='$depid'";
                                        $res1 = mysqli_query($conn, $q1);
                                        while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                            echo $r1['d_name'];
                                        }
                                        ?></td>
                                    <td><?php $c_id = $row['c_id'];
                                        $q1 = "SELECT * FROM course where c_id='$c_id'";
                                        $res1 = mysqli_query($conn, $q1);
                                        while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                            echo $r1['c_name'];
                                        }
                                        ?></td>
                                    <!--                                    <td>--><?php
                                    //                                        $s_id = $row['s_id'];
                                    //                                        $q1 = "SELECT * FROM sem where s_id='$s_id'";
                                    //                                        $res1 = mysqli_query($conn, $q1);
                                    //                                        while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    //                                            echo $r1['s_name'];
                                    //                                        }
                                    //                                        ?><!--</td>-->


                                    <!--                                    <td>-->
                                    <!--                                        --><?php //if ($row['status'] == 0) { ?>
                                    <!---->
                                    <!--                                            <a href="student_pending_list.php?Aproval=-->
                                    <?php //echo $row['student_id']; ?><!--"-->
                                    <!--                                               class="btn btn-success"> Accept </a>-->
                                    <!---->
                                    <!--                                            <a href="student_pending_list.php?Reject=-->
                                    <?php //echo $row['student_id']; ?><!--"-->
                                    <!--                                               class="btn btn-danger"> Reject </a>-->
                                    <!---->
                                    <!--                                        --><?php //}
                                    //                                        if ($row['status'] == 1) echo 'Approved'; ?>
                                    <!---->
                                    <!--                                        --><?php //if ($row['status'] == 2) echo 'Rejected'; ?>
                                    <!---->
                                    <!--                                    </td>-->

                                </tr>

                            <?php }
                            ?>

                            </tbody>
                        </table>
                    </div>
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
