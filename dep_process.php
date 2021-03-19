<?php


if(isset($_POST['submit'])){
	
	include 'config.php';
	
	//extract($_POST);
	
	$dept = $_POST['dept'];
	
	$sql = "INSERT INTO `deparment`(`d_name`) VALUES('$dept')";
	$result = mysqli_query($conn,$sql);
	
	if($result){
		header('location:dep_list.php');
	}
	else{
		echo "<script>alert('failed');</script>";
	}
	
}



 ?>