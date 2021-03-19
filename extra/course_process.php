<?php


if(isset($_POST['submit'])){
	
	include 'config.php';
	
	//extract($_POST);
	$course = $_POST['course'];

	$did = $_POST['did'];
	
	
	$sql = "INSERT INTO `course`(dep_id,c_name) VALUES('$did','$course')";
	$result = mysqli_query($conn,$sql);
	
	if($result){
		header('location:course_add.php');
	}
	else{
		echo "<script>alert('failed');</script>";
	}
	
}



 ?>