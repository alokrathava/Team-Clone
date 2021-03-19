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


    <?php include("config.php");

    if (isset($_GET['delete'])) {

        echo $sub_id  = $_GET['delete'];

        $select_query = "delete from sem subject sub_id =$sub_id";
        $select_query_run = mysqli_query($conn, $select_query);
    }
    ?>
    <!--sidebar end-->
    <!--main content start-->

    <section id="main-content">

        <section class="wrapper">
            
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Subject List
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
                                <th data-breakpoints="xs">#</th>
                                <th>Course</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("config.php");
                            $counter = 1;
                            $sql = "SELECT * FROM `subject`
                                    JOIN sem ON sem.s_id = subject.sem_id
                                    JOIN deparment ON deparment.dep_id = subject.dep_id
                                    JOIN course ON course.c_id = subject.c_id;
                                    ";
//                             echo $sql;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                 $dep_id = $row['dep_id'];
                                 $c_id = $row['c_id'];
                                  $s_id  = $row['sem_id'];
								  $sub_id=$row['sub_id'];
                                    ?>
                                    <tr>

                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $row['d_name']; ?></td>
                                        <td><?php echo $row['c_name']; ?></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                        <td><?php echo $row['sub_name']; ?></td>

                                        
                                            <td>
               <a href="#edit<?php echo $row['sub_id'];?>" data-target="#edit<?php echo $row['sub_id'];?>" data-toggle="modal"  class="btn btn-sm btn-primary" >
      Edit</a>
            <a href="sem_list.php?delete=<?php echo $row['sub_id'];?>" class="btn btn-sm btn-warning"   onclick="return confirm('Are You Sure Delete Subject?');">Delete</a>   
            </td>
    
    
     <!----------------edit modal--------------------->
<div id="edit<?php echo $row['sub_id'];?>" class="modal fade in"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              
              <div class="modal-body">
                <h4 class="modal-title">Update Semester</h4>
                <br/>
        <form class="form-horizontal" method="post" action="sub_update.php" enctype='multipart/form-data'>
        <div class="row"> 
          <div class="col-lg-12">
                     

                                       <div class="form-group">
                                    <label for="courseid">Select Course</label>
                                
                                <select name="dep_id" class="form-control" id="country<?php echo $sub_id; ?>" required="">
                               <?php
                              
                                $query = "SELECT * FROM deparment";
                                $run_query = mysqli_query($conn, $query);
                                
                                while ($row1 = mysqli_fetch_array($run_query)) {
                                ?>
                            <option value="<?php echo $row1['dep_id']; ?>"  <?php if($dep_id == $row1['dep_id']) echo 'selected';?> > <?php echo $row1['d_name']; ?></option>
                                       <?php } ?>   
                             </select>
                                         
                                     </div>    

                                     
                                       <div class="form-group">
                                         <label for="courseid">Select Department</label>
                               <select name="c_id" class="form-control" id="state<?php echo $sub_id;?>">
                               <?php
                              
                                $query = "SELECT * FROM course where dep_id='$dep_id'";
                                $run_query = mysqli_query($conn, $query);
                                
                                while ($row2 = mysqli_fetch_array($run_query)) {
                                ?>
                            <option value="<?php echo $row2['c_id']; ?>" <?php if($c_id == $row2['c_id']) echo 'selected';?>> <?php echo $row2['c_name']; ?></option>
                                       <?php } ?>   
                             </select>
							  <div class="select-dropdown"></div>
                                          </div>


                                      <div class="form-group">
                                          <label for="courseid">Select Semester</label>
										   
                               <select name="s_id" class="form-control"  id="city<?php echo $sub_id;?>" required="">
                               <?php
                              
                                $query = "SELECT * FROM sem where dep_id='$dep_id'";
                                $run_query = mysqli_query($conn, $query);
                                
                                while ($row3 = mysqli_fetch_array($run_query)) {
                                ?>
                            <option value="<?php echo $row3['s_id']; ?>"  <?php if($s_id == $row3['s_id']) echo 'selected';?> > <?php echo $row3['s_name']; ?></option>
                                       <?php } ?>   
                             </select> 
							 <div class="select-dropdown"></div>
							 </div>

                                <div class="form-group">
                                    <label for="Departmentid">Subject Name</label>
                                    <input type="text" name="sub_name" class="form-control"   placeholder="Enter Dep" value="<?php echo $row['sub_name']; ?>">
                                </div>
        </div>    
    </div>
             <div class="modal-footer">
                <input type="hidden" name="sub_id" value="<?php echo $row['sub_id'];?>" > 
    <button type="submit" class="btn btn-success">Save Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div>
            </div>
  </div><!--end of modal-dialog-->
                                        
                                    </tr>
									
 <script type="text/javascript">
        $(document).ready(function () {
            $('#country<?php echo $sub_id;?>').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxFile.php',
                        data: 'dep_id=' + countryID,
                        success: function (html) {
                            $('#state<?php echo $sub_id;?>').html(html);
                            $('#city<?php echo $sub_id;?>').html('<option value="">Select course first</option>');
                        }
                    });
                } else {
                    $('#state<?php echo $sub_id;?>').html('<option value="">Select Department first</option>');
                    $('#city<?php echo $sub_id;?>').html('<option value="">Select course first</option>');
                }
            });

            $('#state<?php echo $sub_id;?>').on('change', function () {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxFile.php',
                        data: 'c_id=' + stateID,
                        success: function (html) {
                            $('#city<?php echo $sub_id;?>').html(html);
                        }
                    });
                } else {
                    $('#city<?php echo $sub_id;?>').html('<option value="">Select course first</option>');
                }
            });
        });
    </script>

                                    <?php
                                    $counter++;
                                }
                            }
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
