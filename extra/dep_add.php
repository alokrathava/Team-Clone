<?php
session_start();
if (!isset($_SESSION['email']))
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Responsive_table :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<!--header end-->
<!--sidebar start-->
<?php 

include ('top_menu.php');
include ('left_menu.php');

?>

<?php  include("config.php");

if(isset($_GET['delete'])){
                   
                     echo  $dep_id=$_GET['delete'];

                      $select_query= "delete from deparment where dep_id=$dep_id";
                      $select_query_run =     mysqli_query($conn,$select_query);
           }
           ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content">

	<section class="wrapper">
	 <section class="panel">
                        <header class="panel-heading">
                           
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
							
							
                                <form role="form" method="post" action="dep_process.php">
                                <div class="form-group">
                                    <label for="Departmentid">Department Name</label>
                                    <input type="text" name="dept" class="form-control"   placeholder="Enter Dep">
                                </div>
                             
                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                            </form>
							
							
                            </div>

                        </div>
                    </section>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Department List
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
            <th>Department</th>    
			<th>Action</th>            
          </tr>
        </thead>
        <tbody>
   <?php
						include("config.php");
							$counter = 1;
							//$sql = "select * from student_reg";
							$sql = "SELECT * FROM `deparment`";
						
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
							{						
							?>
          <tr>
		  
            <td><?php echo $counter; ?></td>
            
			<td><?php echo $row['d_name'];?></td>
            <td>
			<a href="dep_add.php?delete=<?php echo $row['dep_id'];?>" onclick="return confirm('Are You Sure Delete Department?');">
			Delete</a>
</td>
	</a>	
	</td>
    
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
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
