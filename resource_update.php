	<?php 
include('config.php');
	
	$re_id = $_POST['re_id'];
	$re_name = $_POST['re_name'];
	$description = $_POST['description'];
	//$password = $_POST['password'];


	$sql="update resource set re_name='$re_name',description='$description' where re_id='$re_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='resource_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='resource_list.php?wrong</script>";  
				}		
		
	
	
?>