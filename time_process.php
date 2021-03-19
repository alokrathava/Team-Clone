<?php

if (isset($_POST['submit'])) {

    include 'config.php';

    //extract($_POST);
    $time = $_POST['time'];
    $start = $_POST['s_time'];
    $end = $_POST['e_time'];

    echo $sql = "INSERT INTO time_slots(time,s_time,e_time) VALUES('$time','$start','$end')";
    if (isset($conn)) {
        $result = mysqli_query($conn, $sql);
    }

    if (isset($result)) {
        if ($result) {
            header('location:time_list.php');
        } else {
            echo "<script>alert('failed');</script>";
            header('location:time_add.php');
        }
    }

}


?>