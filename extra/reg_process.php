	
<?php include('config.php');

if($_POST['reg']=='submit')
	
		$fname= $_POST["fname"];
		$phone= $_POST["phone"];
		$address= $_POST["add"];
		$email= $_POST["email"];
		$pass= $_POST["pass"];
		$gender= $_POST["gender"];
		$did= $_POST["did"];
		$cid= $_POST["cid"];
		$sid= $_POST["sid"];
		
		
	
	$sql="INSERT INTO student_reg(name,phone,addr,email,pass,gender,dep_id,c_id,s_id) VALUES('$fname','$phone','$address','$email','$pass','$gender','$did','$cid','$sid')";
	
$result = mysqli_query($conn,$sql);
	//echo $sql;
 if($result)
	{
				echo "<script>alert('Reg Successfully')</script>";
				echo"<script>window.open('index.php','_self')</script>";	
} 
    else
    {
			echo "<script>alert('Reg Unsuccessfully')</script>";
			echo"<script>window.open('index.php','_self')</script>";
	}
	
			
	
?>