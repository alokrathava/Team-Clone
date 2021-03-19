	<?php 
include('config.php');
	
	$slots_id = $_POST['slots_id'];
	$time = $_POST['time'];
	$s_time = $_POST['s_time'];
	$e_time = $_POST['e_time'];
	//$password = $_POST['password'];


	$sql="update time_slots set time='$time',s_time='$s_time',e_time='$e_time' where slots_id='$slots_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='time_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='time_list.php?wrong</script>";  
				}		
		
	
	
?>