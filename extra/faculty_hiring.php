<?php
require 'config.php';
/*======================Data Fetch=========================*/
$Name = $_POST['tech_name'];
$Phone = $_POST['tech_contact_no'];
$Email = $_POST['tech_email'];
$Password = $_POST['tech_password'];
$Gender = $_POST['gender'];
$Address = $_POST['address'];

//echo $Name, $Email, $Phone, $Password, $Gender, $Address;

/*======================Insert query=========================*/
$insert_faculty = "INSERT INTO `teacher_reg` (`name`, `phone`, `addr`, `email`, `pass`, `gender`) 
                       VALUES ('$Name','$Phone','$Address','$Email','$Password','$Gender')";
//echo $insert_faculty;
//
if (isset($conn)) {
    $result = $conn->query($insert_faculty);
}

if ($result) {
    echo '<script>window.location.href="faculty_pending_list.php"</script>';
} else {
    echo '<script>alert("Error In Insertion")</script>';
    echo '<script>window.location.href="faculty_pending_list.php"</script>';
}



?>