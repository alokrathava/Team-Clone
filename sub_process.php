
<?php

if(isset($_POST['submit'])){
	
	include 'config.php';
	
	//extract($_POST);
	

	$did = $_POST['did'];
	$course= $_POST['c_id'];
    $subname= $_POST['sub_name'];
	$semid= $_POST['sem_id'];
	
	$sql = "INSERT INTO `subject`(dep_id,c_id,sub_name,sem_id) VALUES('$did','$course','$subname','$semid')";
	$result = mysqli_query($conn,$sql);
	
	if($result){
		header('location:sub_list.php');
	}
	else{
		echo "<script>alert('failed');</script>";
	}
	
}



 ?>