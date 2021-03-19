	
<?php include('config.php');

if($_POST['reg']=='submit')
	
		$fname= $_POST["fname"];
		$phone= $_POST["phone"];
		$address= $_POST["add"];
		$email= $_POST["email"];
		$pass= $_POST["pass"];
		$gender= $_POST["gender"];
	
	$sql="INSERT INTO teacher_reg(name,phone,addr,email,pass,gender) VALUES('$fname','$phone','$address','$email','$pass','$gender')";
	
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