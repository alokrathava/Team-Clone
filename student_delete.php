
<?php 
include('config.php');
	
	$customer_id = $_POST['customer_id'];
	
	$sql="update customer set status=1 where customer_id='$customer_id'";

	$result = mysqli_query($conn,$sql);
	
	if ($result){

		echo "<script>document.location='customer_list.php?delete'</script>";  
				}else
			{
		echo "<script>document.location='customer_list.php?wrong'</script>";  
				}		
		
	
	
?>