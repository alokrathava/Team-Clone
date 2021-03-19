<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<head>
    <title>Register</title>
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
        });
    </script>

</head>
<body>
<div class="reg-w3">
    <div class="w3layouts-main">
        <h2>Student Register Now</h2>
        <form action="reg_process.php" method="post">

            <input type="text" class="ggg" name="fname" placeholder="NAME" required="">
            <input type="TEXT" class="ggg" name="phone" placeholder="PHONE" required="">
            <input type="text" class="ggg" name="add" placeholder="ADDRESS" required="">
            <input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
            <input type="password" class="ggg" name="pass" placeholder="PASSWORD" required="">


            <div class="ggg">
                <select class="form-control" name="gender">
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="ggg">
                <label class="label">Department</label>

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
                </select>


            </div>

            <div class="ggg">
                <label class="label">Course</label>
                <select name="cid" class="form-control" id="state">
                    <option value="">Select Department first</option>
                </select>
                <div class="select-dropdown"></div>
            </div>

            <div class="ggg">
                <label class="label">Semester</label>


                <select name="sid" class="form-control" id="city">
                    <option value="">Select Department</option>
                </select>

                <div class="select-dropdown"></div>
            </div>

            <div class="clearfix"></div>
            <input type="submit" value="submit" name="reg">
        </form>
        <p>Already Registered.<a href="index.php">Login</a></p>
    </div>
</div>
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
