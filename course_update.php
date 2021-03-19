	<?php 
include('config.php');
	
	$dep_id = $_POST['dep_id'];
	$c_id = $_POST['c_id'];
	$c_name = $_POST['c_name'];
	
	//$password = $_POST['password'];


	$sql="update course set dep_id='$dep_id',c_name='$c_name' where c_id='$c_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='course_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='course_list.php?wrong</script>";  
				}		
		
	
	
?>