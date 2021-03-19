
<?php

if(isset($_POST['submit'])){
	
	include 'config.php';
	
	//extract($_POST);
	

	$dep_id = $_POST['dep_id'];
	$c_id= $_POST['c_id'];
    $sem_id= $_POST['sem_id'];
	$sub_id= $_POST['sub_id'];
	$res_id= $_POST['res_id'];
	$time_id= $_POST['time_id'];
	$day= $_POST['day'];
	$teacher_id= $_POST['teacher_id'];
	 
	 $sql = "INSERT INTO time_table(dep_id,c_id,sem_id,sub_id,res_id,time_slot,day,tech_id) 
	 VALUES('$dep_id','$c_id','$sem_id','$sub_id','$res_id','$time_id','$day','$teacher_id')";

//	 echo $sql;

	$result = mysqli_query($conn,$sql);
	
    	if($result){
    		header('location:home.php');
    	}
    	else{

    		header('location:timetable_add.php');
    		echo "<script>alert('failed');</script>";
    	}
	
}



 ?>