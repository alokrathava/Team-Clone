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

    <?php
    include('config.php');
    if (isset($_GET['delete'])) {
        echo $id = $_GET['delete'];
        $sql = "DELETE FROM sub_category WHERE sub_cat_id= '$id'";
        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
        }
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
            <div class="table-agile-info">
                <div class="panel-heading">
                    Add Faculty
                </div>
                <form role="form" method="post" action="faculty_hiring.php" style="margin: 10px; padding: 10px">
                    <div class="form-group">
                        <label for="courseid">Faculty Name</label>
                        <input type="text" name="tech_name" class="form-control" id="semid" required>
                    </div>
                    <div class="form-group">
                        <label for="courseid">Phone Number</label>
                        <input type="number" name="tech_contact_no" class="form-control" id="semid" required>
                    </div>
                    <div class="form-group">
                        <label for="courseid">Email</label>
                        <input type="email" name="tech_email" class="form-control" id="semid" required>
                    </div>
                    <div class="form-group">
                        <label for="courseid">Password</label>
                        <input type="password" name="tech_password" class="form-control" id="semid" required>
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
                    <div class="form-group">
                        <label for="courseid">Faculty Address</label>
                        <textarea class="form-control" rows="5" name="address">
                        </textarea>
                    </div>
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
                    <br>
                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </form>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Teacher List
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
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("config.php");
                            $counter = 0;
                            $sql = "select * from teacher_reg";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                <tr>

                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $row['t_name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
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