<?php

if(isset($_POST['submit'])){
	
	include 'config.php';
	
	//extract($_POST);
	

	
	$rname= $_POST['re_name'];
	$desc= $_POST['description'];
   
	 
	echo $sql = "INSERT INTO resource(re_name,description) VALUES('$rname','$desc')";
	$result = mysqli_query($conn,$sql);
	
	if($result){
		header('location:resource_list.php');
	}
	else{
		echo "<script>alert('failed');</script>";
	}
	
}



 ?>