	<?php 
include('config.php');
	
	 $teacher_id = $_POST['teacher_id'];

	
	$sql="select status from teacher_reg where teacher_id='$teacher_id'";
		$res = mysqli_query($conn,$sql)or die(mysqli_error());
		while($row = mysqli_fetch_assoc($res)){

			if($row['status'] == 0){
				 	$sql1="update teacher_reg set status=1 where teacher_id='$teacher_id'";
					$result1 = mysqli_query($conn,$sql1);	
			 	}else if($row['status'] == 1)
			 	{
				 	$sql2="update teacher_reg set status=0 where teacher_id='$teacher_id'";
					$result2 = mysqli_query($conn,$sql2);
			 	}

		}
	
	
?>
