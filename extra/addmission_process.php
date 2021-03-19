<?php
session_start();

require 'config.php';
/*==============================Data Fetch===============================*/
$name = $_POST['stud_name'];
$phone_no = $_POST['stud_contact_no'];
$email = $_POST['stud_email'];
$p_email = $_POST['parent_email'];
$password = $_POST['stud_password'];
$gender = $_POST['gender'];
$department = $_POST['did'];
$course = $_POST['cid'];
//$sem = $_POST['s_name'];
$address = $_POST['address'];


/*==============================Insert Query===============================*/
$insert_student = "INSERT INTO `student_reg` (`name`, `phone`, `addr`, `email`, `parent_email`, `pass`, `gender`, `dep_id`, `c_id`) 
                       VALUES ('$name','$phone_no','$address','$email','$p_email','$password','$gender','$department','$course')";

//echo $insert_student;

if (isset($conn)) {
    $result = $conn->query($insert_student);
}

if ($result) {
    echo '<script>window.location.href="student_pending_list.php"</script>';
} else {
    echo '<script>alert("Error Occur")</script>';
    echo '<script>window.location.href="student_pending_list.php"</script>';
}

?>