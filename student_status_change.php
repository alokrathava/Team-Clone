	<?php 
include('config.php');
	
	 $student_id = $_POST['student_id'];

	
	$sql="select status from student_reg where student_id='$student_id'";
		$res = mysqli_query($conn,$sql)or die(mysqli_error());
		while($row = mysqli_fetch_assoc($res)){

			if($row['status'] == 0){
				 	$sql1="update student_reg set status=1 where student_id='$student_id'";
					$result1 = mysqli_query($conn,$sql1);	
			 	}else if($row['status'] == 1)
			 	{
				 	$sql2="update student_reg set status=0 where student_id='$student_id'";
					$result2 = mysqli_query($conn,$sql2);
			 	}

		}
	
	
?>
