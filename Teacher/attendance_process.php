<?php

require 'config.php';
/*=====================Data Fetch======================*/
$id = $_POST['id'];
$attendance = $_POST['attendance'];
$lan = sizeof($attendance);


//    echo $date,$id,$std_name,$attendance;

/*====================Query============================*/
for ($i = 0; $i < $lan; $i++) {
    $att = $attendance[$i];
    $s_id = $id[$i];

    $attendance_insert = "INSERT INTO `attendance` (`st_no`, `attendance`) VALUES ('$s_id','$att')";
    echo $attendance_insert;

    if (isset($conn)) {
        $result = $conn->query($attendance_insert);
    }

}
if ($result) {
    echo 'Attendance Inserted';
    header('Location:attendance.php');
} else {
    echo '<script>alert("Error")</script>';
    header('Location:attendance.php');
}
