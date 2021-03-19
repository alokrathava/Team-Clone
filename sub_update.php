	<?php 
include('config.php');

	$sub_id  = $_POST['sub_id'];
	$sem_id  = $_POST['s_id'];
	$dep_id = $_POST['dep_id'];
	$c_id = $_POST['c_id'];
	$sub_name = $_POST['sub_name'];
	
	  $sql="update subject set sem_id='$sem_id',dep_id='$dep_id',c_id='$c_id', sub_name='$sub_name' where sub_id ='$sub_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='sub_list.php?update'</script>";  
				}else
			{
		echo "<script>document.location='sub_list.php?wrong</script>";  
				}		
		
	
	
?>