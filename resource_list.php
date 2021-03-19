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


<section id="container">
    <!--header start-->
    <!--header end-->
    <!--sidebar start-->
    <?php

    include('top_menu.php');
    include('left_menu.php');

    ?>

    <?php  include("config.php");

if(isset($_GET['delete'])){
                   
                       $re_id=$_GET['delete'];

                      $select_query= "delete from resource where re_id=$re_id";
                      $select_query_run =     mysqli_query($conn,$select_query);
           }?>
    <!--sidebar end-->
    <!--main content start-->

    <section id="main-content">

        <section class="wrapper">
           
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Resources List
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
                                <th>Resource Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("config.php");
                            $counter = 1;
                            //$sql = "select * from student_reg";
                            $sql = "SELECT * FROM resource ";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                ?>
                                <tr>

                                    <td><?php echo $counter; ?></td>

                                    <td><?php echo $row['re_name']; ?></td>
                                    <td><?php echo $row['description']; ?></td>


                                    <td>
              <a href="#edit<?php echo $row['re_id'];?>" data-target="#edit<?php echo $row['re_id'];?>" data-toggle="modal"  class="btn btn-sm btn-primary" >
      Edit</a>
            <a href="resource_list.php?delete=<?php echo $row['re_id'];?>" class="btn btn-sm btn-warning"  onclick="return confirm('Are You Sure Delete Resource?');">
            Delete</a>
</td>
    
     <!----------------Edit modal--------------------->
<div id="edit<?php echo $row['re_id'];?>" class="modal fade in"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              
              <div class="modal-body">
                <h4 class="modal-title">Update Recourse</h4>
                <br/>
        <form class="form-horizontal" method="post" action="resource_update.php" enctype='multipart/form-data'>
        <div class="row"> <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Departmentid"> Name</label>
                                   <select name="re_name" class="form-control" id="country">
                                    
                                    <option value="Class" <?php if($row['re_name']=='Class'){echo 'selected';}?>>Class</option>
                                    <option value="Lab" <?php if($row['re_name']=='Lab'){echo 'selected';}?>>Lab</option>
                                    <option value="Workshop" <?php if($row['re_name']=='Workshop'){echo 'selected';}?>>Workshop</option>

                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="Departmentid">Description</label>
                                    <input type="text" name="description" class="form-control"   placeholder="Enter Dep" value="<?php echo $row['description']; ?>">
                                </div>
                             </div>    
    </div>
             <div class="modal-footer">
                <input type="hidden" name="re_id" value="<?php echo $row['re_id'];?>" > 
    <button type="submit" class="btn btn-success">Save Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div>
            </div>
  </div><!--end of modal-dialog-->

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
