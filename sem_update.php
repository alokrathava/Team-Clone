	<?php 
include('config.php');

	$s_id  = $_POST['s_id'];
	$dep_id = $_POST['dep_id'];
	$c_id = $_POST['c_id'];
	$s_name = $_POST['s_name'];
	
	//$password = $_POST['password'];


	$sql="update sem set s_name='$s_name',c_id='$c_id',dep_id='$dep_id' where s_id='$s_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='sem_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='sem_list.php?wrong</script>";  
				}		
		
	
	
?>