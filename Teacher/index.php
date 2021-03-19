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

    ?>

    <section id="main-content">

        <section class="wrapper">

            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Time Table
                    </div>
                    <a class="btn btn-success btn-print" href="" onclick="window.print()"><i
                                class="glyphicon glyphicon-print"></i> Print</a>

                    <br>
                    <table class="table" border="2px;">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql2 = "SELECT * FROM time_slots ";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
                        {

                        ?>
                        <tr>
                            <td><?php echo $row2['s_time'] . ' - ' . $row2['e_time']; ?></td>

                            <?php
                            $a = '';
                            $b = '';
                            $c = '';
                            $d = '';
                            $e = '';
                            $f = '';
                            $g = '';
                            $res_id1 = '';
                            $res_id2 = '';
                            $res_id3 = '';
                            $res_id4 = '';
                            $res_id5 = '';
                            $res_id6 = '';
                            $res_id7 = '';
                            $tid1 = '';
                            $tid2 = '';
                            $tid3 = '';
                            $tid4 = '';
                            $tid5 = '';
                            $tid6 = '';
                            $tid7 = '';

                            $sql3 = "SELECT * FROM time_table where tech_id=$teacher_id";
                            $result3 = mysqli_query($conn, $sql3);
                            while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                                if ($row2['slots_id'] == $row3['time_slot']) {

                                    if ($row3['day'] == 'Monday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $a = $row3['sub_id'];
                                        $res_id1 = $row3['res_id'];
                                        $tid1 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Tuesday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $b = $row3['sub_id'];
                                        $res_id2 = $row3['res_id'];
                                        $tid2 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Wednesday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $c = $row3['sub_id'];
                                        $res_id3 = $row3['res_id'];
                                        $tid3 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Thursday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $d = $row3['sub_id'];
                                        $res_id4 = $row3['res_id'];
                                        $tid4 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Friday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $e = $row3['sub_id'];
                                        $res_id5 = $row3['res_id'];
                                        $tid5 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Saturday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $f = $row3['sub_id'];
                                        $res_id6 = $row3['res_id'];
                                        $tid6 = $row3['tech_id'];
                                    }
                                    if ($row3['day'] == 'Sunday' && $row3['time_slot'] == $row2['slots_id']) {
                                        $g = $row3['sub_id'];
                                        $res_id7 = $row3['res_id'];
                                        $tid7 = $row3['tech_id'];
                                    }

                                }
                            }
                            ?>
                            <td><?php
                                $q1 = "SELECT * FROM subject where sub_id='$a'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }

                                $q1 = "SELECT * FROM resource where re_id='$res_id1'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }

                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid1'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }


                                ?></td>


                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$b'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id2'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }

                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid2'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }
                                ?></td>

                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$c'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id3'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }

                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid3'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }
                                ?></td>

                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$d'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id4'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid4'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }

                                ?></td>

                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$e'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id5'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '</br>';
                                }
                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid5'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }

                                ?></td>

                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$f'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id7'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid6'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }

                                ?></td>

                            <td><?php $q1 = "SELECT * FROM subject where sub_id='$g'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['sub_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM resource where re_id='$res_id7'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['re_name'] . '<br>';
                                }
                                $q1 = "SELECT * FROM teacher_reg where teacher_id='$tid7'";
                                $res1 = mysqli_query($conn, $q1);
                                while ($r1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                                    echo $r1['t_name'];
                                }

                                ?></td>


                            <?php } ?>

                        </tr>

                        </tbody>
                    </table>
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
