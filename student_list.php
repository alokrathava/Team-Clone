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
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="css/monthly.css">
    <!-- //calendar -->

    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <header class="panel-heading">
                Students List
            </header>
            <br>
            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead style="background-color: gray;">
                    <tr>
                        <th style="color:white">No.</th>
                        <th style="color:white">Name</th>
                        <th style="color:white">Enroll No.</th>
                        <th style="color:white">Cont No</th>
                        <th style="color:white">Email</th>
                        <th style="color:white">Address</th>
                        <th style="color:white">Sem.</th>
                        <th style="color:white">Branch-Course</th>
                        <th style="color:white">Status</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $cnt = 1;
                    include('config.php');

                    $querystudent = "SELECT * FROM `student_reg` JOIN sem ON sem.s_id = student_reg.s_semester JOIN deparment ON deparment.dep_id = student_reg.s_department JOIN course ON course.c_id = student_reg.s_course";

                    $query = mysqli_query($conn, $querystudent) or die(mysqli_error());

                    while ($row = mysqli_fetch_array($query)){

                    ?>
                    <tr>
                        <td><?php echo $cnt++; ?></td>
                        <td><?php echo $row['s_name']; ?></td>
                        <td><?php echo $row['s_enroll_no']; ?></td>
                        <td><?php echo $row['s_phone']; ?></td>
                        <td><?php echo $row['s_email']; ?></td>
                        <td><?php echo $row['s_address'] . ',' . $row['s_city'] . ',' . $row['s_state']; ?></td>
                        <td><?php echo $row['s_name']; ?></td>
                        <td><?php echo $row['d_name'] . '-' . $row['c_name']; ?></td>
                        <td><input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Deactive"
                                   data-onstyle="success" data-offstyle="danger" data-style="ios"
                                   onchange="status_change(this.value);" value="<?php echo $row['s_id']; ?>"
                                   id="<?php echo $cnt; ?>" <?php if ($row['status'] == 0) {
                                echo 'unchecked';
                            } else {
                                echo 'checked';
                            } ?> >
                        </td>

                    </tr>


                    </tbody>
                    <?php } ?>

                </table>

            </div>
        </section>


        <!-- / footer -->
    </section>

</section>
<script>

    function status_change(student_id) {
        // alert(photographer_id);
        // alert(sid);
        $.ajax({
            //alert(photographer_id);
            type: "POST",
            url: "student_status_change.php",
            data: {'student_id': student_id},
            success: function (result) {
                // alert(result);
                toastr.success('Status Changed Successfully');

            }
        });

    }

</script>

<script>
    $(function () {
        $('#toggle-two').bootstrapToggle({
            on: 'Active',
            off: 'Dactive'
        });
    })
</script>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>

<script type="text/javascript" src="js/monthly.js"></script>

</body>
</html>
