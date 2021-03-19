	<?php 
include('config.php');
	
	$dep_id = $_POST['dep_id'];
	$d_name = $_POST['d_name'];
	
	//$password = $_POST['password'];


	$sql="update deparment set d_name='$d_name' where dep_id='$dep_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='dep_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='dep_list.php?wrong</script>";  
				}		
		
	
	
?>